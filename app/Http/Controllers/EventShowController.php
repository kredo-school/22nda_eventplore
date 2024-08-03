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

        // related events
        // 現在のイベントのカテゴリーIDを取得
        $category_ids = $event->eventCategories->pluck('category_id')->toArray();

        // 関連イベントを取得
        $related_events = Event::where('id', '!=', $event->id) // 現在のイベントを除外
        ->where(function ($query) use ($category_ids, $event) {
            $query->whereHas('eventCategories', function ($query) use ($category_ids) {
                $query->whereIn('category_id', $category_ids);
            })
            ->orWhere('area_id', $event->area_id)
            ->orWhere('event_owner_id', $event->event_owner_id);
        })
        ->with(['eventCategories'])
        ->get();

        // 関連度を計算してソート
        $related_events = $related_events->map(function ($related_event) use ($category_ids, $event) {
            // 共通するカテゴリーの数を計算
            $common_categories_count = $related_event->eventCategories->pluck('category_id')->intersect($category_ids)->count();
            // 同じエリアか判定
            $same_area = $related_event->area_id == $event->area_id;
            // 同じイベントオーナーか判定
            $same_owner = $related_event->event_owner_id == $event->event_owner_id;
            // 関連度を計算 (カテゴリーの一致 3ポイント、エリアの一致 2ポイント、オーナーの一致 1ポイント)
            $related_event->related_score = (3 * $common_categories_count) + ($same_area ? 2 : 0) + ($same_owner ? 1 : 0);

            return $related_event;
        })->sortByDesc('related_score')->take(6);

        $data = compact('areas', 'categories', 'reservation','event', 'availableSlots','eventDates','eventTimes','related_events');

        // $totalPrice が定義されている場合のみ追加
        if ($totalPrice !== null) {
            $data['totalPrice'] = $totalPrice;
        }

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
