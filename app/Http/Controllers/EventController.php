<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Event;
use App\Models\Category;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    private $event;
    private $category;
    public function __construct(Event $event, Category $category){
        $this->event = $event;
        $this->category = $category;
    }

    public function create()
    {
        $areas = Area::all();
        $categories = Category::all();
        return view('event-owners.events.register', compact('areas','categories'));
    }

    public function getSessionId(){
        $session = Session::getId();
        return response()->json($session);
    }

    public function store(Request $request){
        // dd($request);
        // validate the request
        // $request->validate([
            // step1
            // 'event_name' => 'required',
            // 'start_date' => 'required',
            // 'finish_date' => 'required',
            // 'start_time' => 'required',
            // 'finish_time' => 'required',
            // 'details' => 'required|max:1000',
            // 'history' => 'required|max:1000',
            // 'max_participants' => 'required|integer|min:1',
            // 'app_deadline' => 'required',
            // step2
            // 'categories' => 'required|array|between:1,4',
            // step3
            // 'area_id' => 'required',
            // 'address' => 'required',
            // step4
            // 'image' => 'required|mimes:jpeg,jpg,png,jig',
            // step5
            // 'parking' => 'required|max:100',
            // 'train' => 'required|max:100',
            // 'toilet' => 'required|max:100',
            // 'weather' => 'required|max:100',
            // 'add_info' => 'max:100',
            // step6
            // 'facebook' => 'url',
            // 'instagram' => 'url',
            // 'x' => 'url',
            // 'official' => 'url' 
        // ]);
        $event = new Event();
        $image = new EventImage();
        $image->image="data:image/".$request->image->extension().
                            ";base64,".base64_encode(file_get_contents($request->image));
        $image->event_id = $event->id;

        // Save the form data to the db
        $event->event_name = $request->event_name;
        $event->start_date = $request->start_date;
        $event->finish_date = $request->finish_date;
        $event->start_time = $request->start_time;
        $event->finish_time = $request->finish_time;
        $event->details = $request->details;
        $event->history = $request->history;
        $event->max_participants = $request->max_participants;
        $event->app_deadline = $request->app_deadline;
        $event->area_id = $request->area_id;
        $event->address = $request->address;
        // $event->parking = $request->parking;
        // $event->train = $request->train;
        // $event->toilet = $request->toilet;
        // $event->weather = $request->weather;
        // $event->category_id = $request->category_id;
        // $event->add_info = $request->add_info;
        $event->facebook_link = $request->facebook_link;
        $event->insta_link = $request->insta_link;
        $event->x_link = $request->x_link;
        // $event->official = $request->official;
        $event->event_owner_id = 1; //Auth::event_owner()->id; //logged-in event_owner's id
        $event->save();
        $image->event()->associate($event);
        $image->save();
        $event->eventImages()->save($image);
        $event->save();

        $event_categories = [];
        foreach($request->categories as $category_id){
            $event_categories [] = ['category_id' => $category_id];
        }
        $this->event->eventCategories()->createMany($event_categories);

        return redirect()->route('show');
    }

    public function show()
    {
        $id = Auth::guard('event_owner')->id();

        $query = Event::query();

        // テーブル結合
        $query->leftJoin('event_categories', 'events.id', '=', 'event_categories.event_id')
            ->leftJoin('areas', 'events.area_id', '=', 'areas.id')
            ->leftJoin(DB::raw('(SELECT event_id, AVG(star) as avg_star FROM reviews GROUP BY event_id) as avg_reviews'), 'events.id', '=', 'avg_reviews.event_id')
            ->leftJoin(DB::raw('(SELECT event_id, MIN(id) as min_image_id FROM event_images GROUP BY event_id) as first_event_images'), 'events.id', '=', 'first_event_images.event_id')
            ->leftJoin('event_images', 'first_event_images.min_image_id', '=', 'event_images.id')
            ->leftJoin(DB::raw('(SELECT event_id, SUM(num_tickets) as sum_tickets FROM reservations GROUP BY event_id) as sum_reservations'), 'events.id', '=', 'sum_reservations.event_id')
            ->groupBy('events.id')
            ->where('events.event_owner_id', $id);

        $events = $query->distinct()->paginate(6, [
            'events.*',
            'areas.name as area_name',
            'avg_reviews.avg_star as avg_star',
            'event_images.image as event_image',
            'sum_reservations.sum_tickets as sum_tickets',
        ]);

        return view('event-owners.events.show', compact('events'));
    }

    public function destroy(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::guard('event_owner')->user();

        if (Hash::check($request->input('password'), $user->password)) {
            $this->event->destroy($id);
    
            return redirect()->back()->with('success', 'Event deleted successfully.');
        } else {
            return redirect()->back()->withErrors(['password' => 'The password is incorrect.']);
        }
    }
}
