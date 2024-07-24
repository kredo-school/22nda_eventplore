<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $areas = Area::all();
        $categories = Category::all();

        return view('home.home', compact('areas', 'categories'));
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

        // テーブル結合
        $query->leftJoin('event_categories', 'events.id', '=', 'event_categories.event_id')
            ->leftJoin('areas', 'events.area_id', '=', 'areas.id')
            ->leftJoin(DB::raw('(SELECT event_id, AVG(star) as avg_star FROM reviews GROUP BY event_id) as avg_reviews'), 'events.id', '=', 'avg_reviews.event_id')
            ->leftJoin(DB::raw('(SELECT event_id, MIN(id) as min_image_id FROM event_images GROUP BY event_id) as first_event_images'), 'events.id', '=', 'first_event_images.event_id')
            ->leftJoin('event_images', 'first_event_images.min_image_id', '=', 'event_images.id')
            // ->groupBy('events.id')
            ;

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
            $query->where('area_id', $area);
        }
        // カテゴリー指定時
        if (!empty($categories)) {
            $query->whereIn('event_categories.category_id', $categories);
        }

        $search_events = $query->distinct()->get([
            'events.*',
            'areas.name as area_name',
            'avg_reviews.avg_star as avg_star',
            'event_images.image as event_image',
        // ]);
        ])->groupBy('events.id');


        return view('home.event-menu', compact('search_events', 'areas'));
    }

    public function searchFromNav(Request $request)
    {
        $areas = Area::all();

        $date = $request->input('date');
        $area = $request->input('area');

        // Query to fetch events
        $query = Event::query();

        // Join necessary tables
        $query->leftJoin('event_categories', 'events.id', '=', 'event_categories.event_id')
                ->leftJoin('areas', 'events.area_id', '=', 'areas.id')
                ->leftJoin(DB::raw('(SELECT event_id, AVG(star) as avg_star FROM reviews GROUP BY event_id) as avg_reviews'), 'events.id', '=', 'avg_reviews.event_id')
                ->leftJoin(DB::raw('(SELECT event_id, MIN(id) as min_image_id FROM event_images GROUP BY event_id) as first_event_images'), 'events.id', '=', 'first_event_images.event_id')
                ->leftJoin('event_images', 'first_event_images.min_image_id', '=', 'event_images.id');

        // Filter by date if provided
        if (!empty($date)) {
            $query->where(function ($q) use ($date) {
                $q->whereDate('start_date', '<=', $date)
                    ->whereDate('finish_date', '>=', $date);
            });
        }

        // Filter by area if provided
        if (!empty($area)) {
            $query->where('events.area_id', $area);
        }

        // Retrieve distinct events
        $search_events = $query->distinct()->get([
            'events.*',
            'areas.name as area_name',
            'avg_reviews.avg_star as avg_star',
            'event_images.image as event_image',
        ]);

        return view('home.event-menu', compact('search_events', 'areas'));
    }

    public function searchFromHam(Request $request)
    {
        $areas = Area::all();

        $date = $request->input('date');
        $area = $request->input('area');

        // Query to fetch events
        $query = Event::query();

        // Join necessary tables
        $query->leftJoin('event_categories', 'events.id', '=', 'event_categories.event_id')
                ->leftJoin('areas', 'events.area_id', '=', 'areas.id')
                ->leftJoin(DB::raw('(SELECT event_id, AVG(star) as avg_star FROM reviews GROUP BY event_id) as avg_reviews'), 'events.id', '=', 'avg_reviews.event_id')
                ->leftJoin(DB::raw('(SELECT event_id, MIN(id) as min_image_id FROM event_images GROUP BY event_id) as first_event_images'), 'events.id', '=', 'first_event_images.event_id')
                ->leftJoin('event_images', 'first_event_images.min_image_id', '=', 'event_images.id');

        // Filter by date if provided
        if (!empty($date)) {
            $query->where(function ($q) use ($date) {
                $q->whereDate('start_date', '<=', $date)
                    ->whereDate('finish_date', '>=', $date);
            });
        }

        // Filter by area if provided
        if (!empty($area)) {
            $query->where('events.area_id', $area);
        }

        // Retrieve distinct events
        $search_events = $query->distinct()->get([
            'events.*',
            'areas.name as area_name',
            'avg_reviews.avg_star as avg_star',
            'event_images.image as event_image',
        ]);

        return view('home.event-menu', compact('search_events', 'areas'));
    }
}
