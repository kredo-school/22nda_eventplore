<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Event;
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
        $areas = Area::all();
        $categories = Category::all();

        return view('home.home', compact('areas', 'categories'));
    }

    public function show(Request $request)
    {
        $date     = $request->input('date');
        $keyword  = $request->input('keyword');
        $area     = $request->input('area');
        $categories = $request->input('categories');

        $query = Event::query();

        // テーブル結合
        $query->join('event_categories', 'events.id', '=', 'event_categories.event_id');

        if (!empty($date)) {
            $query->where(function($q) use ($date) {
                $q->whereDate('start_date', '<=', $date)
                ->whereDate('finish_date', '>=', $date);
            });
        }

        if (!empty($keyword)) {
            $query->where(function($q) use ($keyword) {
                $q->where('event_name', 'LIKE', "%{$keyword}%")
                ->orWhere('details', 'LIKE', "%{$keyword}%");
            });
        }

        if (!empty($area)) {
            $query->where('area_id', $area);
        }

        if (!empty($categories)) {
            $query->whereIn('category_id', $categories);
        }

        $search_events = $query->distinct()->get(['events.*']);

        return view('home.event-menu', compact('search_events'));
    }

}
