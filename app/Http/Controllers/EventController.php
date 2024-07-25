<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Event;
use App\Models\Category;
use App\Models\EventImage;
use App\Models\Reservation;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    private $event;
    private $category;
    private $reservation;

    public function __construct(Event $event, Category $category, Reservation $reservation){
        $this->event = $event;
        $this->category = $category;
        $this->reservation = $reservation;
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
        $event = new Event();

        $event = new Event();
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
        $event->price = $request->price;
        $event->area_id = $request->area_id;
        $event->address = $request->address;
        $event->parking = $request->parking;
        $event->train = $request->train;
        $event->toilet = $request->toilet;
        $event->weather = $request->weather;
        $event->category_id = $request->category;
        $event->add_info = $request->add_info;
        $event->facebook_link = $request->facebook_link;
        $event->insta_link = $request->insta_link;
        $event->x_link = $request->x_link;
        $event->official = $request->official;
        $event->event_owner_id = Auth::id();
        $event->latitude = $request->latitude;
        $event->longitude = $request->longitude;
        $event->save();

        // $image->event()->associate($event);
        // $image->save();
        // $event->save();

        $event_images = [];
        foreach($request->file("image") as $img){
            $image = new EventImage();
            $image->image="data:image/".explode(".",$img->getClientOriginalName())[1].
            ";base64,".base64_encode(file_get_contents($img));
            $image->event_id = $event->id;
            $event_images [] = ['image' => $image->image,'event_id' => $event->id];
        }
        $event->eventImages()->createMany($event_images);

        $event_categories = [];
        foreach($request->categories as $category_id){
            $event_categories [] = ['category_id' => $category_id,'event_id' => $event->id];
        }
        $event->eventCategories()->createMany($event_categories);

        return redirect()->route('event-list.show');
    }

    public function index()
    {
        $id = Auth::guard('event_owner')->id();
        $areas = Area::all();
        $query = Event::query();

        // テーブル結合
        $query->leftJoin('event_categories', 'events.id', '=', 'event_categories.event_id')
            ->leftJoin('areas', 'events.area_id', '=', 'areas.id')
            ->leftJoin(DB::raw('(SELECT event_id, AVG(star) as avg_star FROM reviews GROUP BY event_id) as avg_reviews'), 'events.id', '=', 'avg_reviews.event_id')
            ->leftJoin(DB::raw('(SELECT event_id, MIN(id) as min_image_id FROM event_images GROUP BY event_id) as first_event_images'), 'events.id', '=', 'first_event_images.event_id')
            ->leftJoin('event_images', 'first_event_images.min_image_id', '=', 'event_images.id')
            ->leftJoin(DB::raw('(SELECT event_id, SUM(num_tickets) as sum_tickets FROM reservations WHERE deleted_at IS NULL GROUP BY event_id) as sum_reservations'), 'events.id', '=', 'sum_reservations.event_id')
            ->groupBy('events.id')
            ->where('events.event_owner_id', $id);

        $events = $query->distinct()->paginate(6, [
            'events.event_name',
            'areas.name as area_name',
            'avg_reviews.avg_star as avg_star',
            'event_images.image as event_image',
            'sum_reservations.sum_tickets as sum_tickets',

        ]);

        return view('event-owners.events.show', compact('events', 'areas'));
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

    public function showReservation($id)
    {
        $areas = Area::all();
        $currentOwnerId = Auth::guard('event_owner')->user()->id;

        $event = Event::select([
                'events.*',
                'areas.name as area_name',
                'avg_reviews.avg_star as avg_star',
                'event_images.image as event_image',
                'sum_reservations.sum_tickets as sum_tickets',
            ])
            ->leftJoin('event_categories', 'events.id', '=', 'event_categories.event_id')
            ->leftJoin('areas', 'events.area_id', '=', 'areas.id')
            ->leftJoin(DB::raw('(SELECT event_id, AVG(star) as avg_star FROM reviews GROUP BY event_id) as avg_reviews'), 'events.id', '=', 'avg_reviews.event_id')
            ->leftJoin(DB::raw('(SELECT event_id, MIN(id) as min_image_id FROM event_images GROUP BY event_id) as first_event_images'), 'events.id', '=', 'first_event_images.event_id')
            ->leftJoin('event_images', 'first_event_images.min_image_id', '=', 'event_images.id')
            ->leftJoin(DB::raw('(SELECT event_id, SUM(num_tickets) as sum_tickets FROM reservations WHERE deleted_at IS NULL GROUP BY event_id) as sum_reservations'), 'events.id', '=', 'sum_reservations.event_id')
            ->where('events.id', $id)
            ->groupBy('events.id')
            ->distinct()
            ->first();

        $reservations = Reservation::where('event_id', $id)->paginate(10);
        $eventOwnerId = $event->event_owner_id ?? null;

        if ($currentOwnerId == $eventOwnerId) {
            return view('event-owners.reservations.show', compact('event', 'reservations', 'areas'));
        } else {
            return back();
        }
    }

    public function destroyReservation(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::guard('event_owner')->user();

        if (Hash::check($request->input('password'), $user->password)) {
            $this->reservation->destroy($id);

            return redirect()->back()->with('success', 'Reservation deleted successfully.');
        } else {
            return redirect()->back()->withErrors(['password' => 'The password is incorrect.']);
        }
    }
}
