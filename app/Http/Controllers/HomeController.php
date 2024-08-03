<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Category;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    private $areas;

    public function index()
    {
        $areas      = Area::all();
        $categories = Category::all();
        $events = Event::with(['eventImages', 'area', 'reviews'])
                    ->where('app_deadline', '>', now())
                    ->get();

        return view('home.home', compact('areas', 'categories', 'events'));
    }

    public function show(Request $request)
    {
        $areas = Area::all();
        $categories = Category::all();

        $date       = $request->input('date');
        $keyword    = $request->input('keyword');
        $area       = $request->input('area');
        $categories = $request->input('categories');

        $query = Event::query();

        // 日付選択時
        if (!empty($date)) {
            $query->where(function($q) use ($date) {
                $q->whereDate('start_date', '<=', $date)
                ->whereDate('finish_date', '>=', $date);
            });
        }

        // キーワード入力時
        if (!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('event_name', 'LIKE', "%{$keyword}%")
                ->orWhere('details', 'LIKE', "%{$keyword}%");
            });
        }

        // エリア指定時
        if (!empty($area)) {
            $query->whereHas('area', function($q) use ($area) {
                $q->where('id', $area);
            });
        }

        // カテゴリー指定時
        if (!empty($categories)) {
            $query->whereHas('eventCategories', function($q) use ($categories) {
                $q->whereIn('category_id', $categories);
            });
        }

        // 申込締切前のイベント
        $query->where('app_deadline', '>', now());

        $events = $query->distinct()->get();

        return view('home.event-menu', compact('events', 'areas'));
    }

    public function search(Request $request)
    {
        $areas = Area::all();

        $date = $request->input('date');
        $area = $request->input('area');

        // Query to fetch events
        $query = Event::query();

        // Filter by date if provided
        if (!empty($date)) {
            $query->where(function ($q) use ($date) {
                $q->whereDate('start_date', '<=', $date)
                    ->whereDate('finish_date', '>=', $date);
            });
        }

        // Filter by area if provided
        if (!empty($area)) {
            $query->whereHas('area', function($q) use ($area) {
                $q->where('id', $area);
            });
        }

        // Retrieve distinct events
        $events = $query->distinct()->get();

        return view('home.event-menu', compact('events', 'areas'));
    }

    public function searchFromCategory(Request $request)
    {
        $areas = Area::all();
        $category = $request->query('category');

        $events = Event::whereHas('categories', function ($query) use ($category) {
            $query->where('name', $category);
        })->get();

        return view('home.event-menu', compact('events', 'areas'));
    }

    public function guideline(){
        $areas = Area::all();

        return view('home.guideline', compact('areas'));
    }


}


    // public function showEvent($id){
    //     $areas = Area::all();
    //     $event = Event::findOrFail($id);
    //     $reservation = null;

    //     // // 評価の集計
    //     $ratingCounts = $event->reviews->groupBy('star')
    //     ->mapWithKeys(function ($reviews, $star) {
    //         // 各評価スターのカウントを取得
    //         return [$star => $reviews->count()];
    //     })->filter(function ($count, $star) {
    //         // スター評価が1から5の範囲内にあるか確認
    //         return in_array($star, [1, 2, 3, 4, 5]);
    //     })->sortKeysDesc();

    //     // デフォルトの評価星（5段階評価）
    //     $defaultStars = [5, 4, 3, 2, 1];

    //     $totalReviews = $event->reviews->count();
    //     $averageRating = $event->reviews->avg('star');

    //     // 関連イベントを取得（例：同じカテゴリーのイベント）
    //     // $relatedEvents = Event::whereHas('categories', function($query) use ($event) {
    //     //     $query->whereIn('categories.id', $event->categories->pluck('id'));
    //     // })
    //     // ->where('id', '!=', $event->id)
    //     // ->take(6)
    //     // ->get();

    //     $latestReviews = $event->reviews()->latest()->take(3)->get();

    //     if (auth()->check()) {
    //         $reservation = Reservation::where('user_id', auth()->id())
    //             ->where('event_id', $id)
    //             ->first();
    //     }

    //     return view('home.show-event', compact('areas', 'event', 'reservation', 'averageRating', 'totalReviews', 'ratingCounts', 'latestReviews'));
    // }
