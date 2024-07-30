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

    public function searchFromNav(Request $request)
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

        $query->where('app_deadline', '>', now());

        // Retrieve distinct events
        $events = $query->distinct()->get();

        return view('home.event-menu', compact('events', 'areas'));
    }

    public function searchFromHam(Request $request)
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

        $query->where('app_deadline', '>', now());
        
        // Retrieve distinct events
        $events = $query->distinct()->get();

        return view('home.event-menu', compact('events', 'areas'));
    }


    public function showEvent($id){
        $areas = Area::all();
        $reservation = Reservation::find($id);
        $event = Event::with('reviews')->findOrFail($id);
        $averageRating = $event->reviews->avg('star');
        $ratingDistribution = $event->reviews->groupBy('star')->map->count();

        if (!$reservation) {
            return redirect()->back();
        }
        return view('home.show-event', compact('areas', 'reservation', 'event', 'averageRating', 'ratingDistribution'));
    }



}
