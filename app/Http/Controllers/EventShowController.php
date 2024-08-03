<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventShowController extends Controller
{
    private $event;
    private $category;


    public function __construct(Event $event,Category $category)
    {
        $this->event = $event;
        $this->category = $category;
    }

    public function show($id)
    {
        $userId = (int) auth()->id();
        $eventId = (int) $id;

        $areas = Area::all();
        $categories = Category::all();
        $reservation = null;
        $reservation = Reservation::where([
            ['event_id', '=', $eventId],
            ['user_id', '=', $userId],
            ])->first();

        // dd($reservation);

        $event = Event::with(['eventImages' => function($query) {
            $query->orderBy('id', 'asc');
        }])->findOrFail($id);
        // $event = $this->event->findOrfail($id);

        // 予約済の場合の合計金額
        $totalPrice = null;
        $totalPrice = $reservation ? $reservation->num_tickets * $event->price : null;

        // 予約済の人数を計算
        $reservedCount = Reservation::where('event_id', $eventId)
                                ->sum('num_tickets');
        $availableSlots = max($event->max_participants - $reservedCount, 0);


        // 日付範囲を生成
        $startDate = Carbon::parse($event->start_date);
        $endDate = Carbon::parse($event->finish_date);
        $appDeadline = Carbon::parse($event->app_deadline);

        // 開始日から終了日までの日付を生成
        $eventDates = [];
        while ($startDate->lte($endDate)) {
            if ($startDate->lt($appDeadline)) {
                $eventDates[] = $startDate->format('Y-m-d'); // 'Y-m-d' 形式でフォーマット
            }
            $startDate->addDay();
        }

        // 時間範囲を作る
        $startTime = Carbon::parse($event->start_time);
        $endTime = Carbon::parse($event->finish_time);

        // 開始時間を丸める
        if ($startTime->minute % 30 != 0) {
            $startTime = $startTime->copy()->addMinutes(30 - ($startTime->minute % 30)); // 次の30分単位に設定
        }

        while ($startTime->lte($endTime)) {
            $eventTimes[] = $startTime->format('H:i'); // 'H:i' 形式でフォーマット
            $startTime->addMinutes(30); // 次の30分単位に進む
        }

        // $totalPrice が定義されている場合のみ追加
        if ($totalPrice !== null) {
            $data['totalPrice'] = $totalPrice;
        }


        //review comment
        // 評価の集計
        $ratingCounts = $event->reviews->groupBy('star')
        ->mapWithKeys(function ($reviews, $star) {
        // 各評価スターのカウントを取得
            return [$star => $reviews->count()];
        })->filter(function ($count, $star) {
        // スター評価が1から5の範囲内にあるか確認
            return in_array($star, [1, 2, 3, 4, 5]);
        })->sortKeysDesc();

        // デフォルトの評価星（5段階評価）
        $defaultStars = [5, 4, 3, 2, 1];

        $totalReviews = $event->reviews->count();
        $averageRating = $event->reviews->avg('star');

        $latestReviews = $event->reviews()->latest()->take(3)->get();

        if (auth()->check()) {
            $reservation = Reservation::where('user_id', auth()->id())
                ->where('event_id', $id)
                ->first();
        }
        //end review


        $data = compact('areas', 'categories', 'reservation', 'event', 'availableSlots', 'eventDates', 'eventTimes', 'ratingCounts', 'defaultStars', 'totalReviews', 'averageRating', 'latestReviews');

        return view('home.show-event', $data);

    }

    public function storeUserReservation(Request $request)
    {
        // 入力データのバリデーション
        $request->validate([
            'num_tickets' => 'required|integer|min:1',
            'event_date' => 'required|date',
            'event_time' => 'required',
            'event_id' => 'required|exists:events,id',
        ]);

        // 認証ユーザーのIDを取得
        $userId = null;
        $userId = auth()->id();

        // 新しい予約の作成
        $reservation = new Reservation();
        $reservation->user_id = $userId;
        $reservation->num_tickets = $request->num_tickets;
        $reservation->reservation_date = $request->event_date;
        $reservation->time = $request->event_time;
        $reservation->event_id = $request->eventId;
        $reservation->save();

        // ユーザーの予約詳細ページにリダイレクト
        return redirect()->route('user.reservation.show', ['id' => $reservation->user_id]);

    }


}
