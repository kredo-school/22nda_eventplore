<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
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
        // $areas = Area::all();
        $categories = Category::all();
        return view('event-owners.events.register', compact('categories'));
    }

    public function getSessionId(){
        $session = Session::getId();
        return response()->json($session);
    }

    public function store(Request $request){
        // validate the request
        $request->validate([
            // step1
            'event_name' => 'required',
            'start_date' => 'required',
            'finish_date' => 'required',
            'start_time' => 'required',
            'finish_time' => 'required',
            'details' => 'required|max:1000',
            'history' => 'required|max:1000',
            'max_participants' => 'required|integer|min:1',
            'app_deadline' => 'required',
            // step2
            'categories' => 'required|array|between:1,4',
            // step3
            'area_id' => 'required',
            'address' => 'required',
            // step4
            'photo' => 'required|mimes:jpeg,jpg,png,jig',
            // step5
            'parking' => 'required|max:100',
            'train' => 'required|max:100',
            'toilet' => 'required|max:100',
            'weather' => 'required|max:100',
            'add_info' => 'max:100',
            // step6
            'facebook' => 'url',
            'instagram' => 'url',
            'x' => 'url',
            'official' => 'url' 
        ]);

        // Save the form data to the db
        $this->event->event_name = $request->event_name;
        $this->event->start_date = $request->start_date;
        $this->event->end_date = $request->end_date;
        $this->event->start_time = $request->start_time;
        $this->event->end_time = $request->end_time;
        $this->event->details = $request->details;
        $this->event->history = $request->history;
        $this->event->max_participants = $request->max_participants;
        $this->event->app_deadline = $request->app_deadline;
        $this->event->area_id = $request->area_id;
        $this->event->address = $request->address;
        $this->event->photo = "data:image/".$request->image->extension().
                            ";base64,".base64_encode(file_get_contents($request->image));
        $this->event->parking = $request->parking;
        $this->event->train = $request->train;
        $this->event->toilet = $request->toilet;
        $this->event->weather = $request->weather;
        $this->event->category_id = $request->category_id;
        $this->event->add_info = $request->add_info;
        $this->event->facebook = $request->facebook;
        $this->event->instagram = $request->instagram;
        $this->event->x = $request->x;
        $this->event->official = $request->official;
        $this->event->save();

        $event_categories = [];
        foreach($request->categories as $category_id){
            $event_categories [] = ['category_id' => $category_id];
        }
        $this->event->eventCategories()->createMany($event_categories);

        return redirect()->route('show');
    }
}
