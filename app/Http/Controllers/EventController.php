<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Event;
use App\Models\Category;
use App\Models\EventImage;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    private $event;
    private $category;
    private $reservation;

    public function __construct(Event $event, Category $category, Reservation $reservation){
        $this->event       = $event;
        $this->category    = $category;
        $this->reservation = $reservation;
    }

    public function create()
    {
        $areas      = Area::all();
        $categories = Category::all();
        return view('event-owners.events.register', compact('areas','categories'));
    }

    public function getSessionId(){
        $session = Session::getId();
        return response()->json($session);
    }

    public function store(Request $request){
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
        $areas  = Area::all();
        $id     = Auth::guard('event_owner')->id();
        $events = Event::where('event_owner_id', $id)->paginate(6);

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

            return redirect()->route('event-list.show')->with('success', 'Event deleted successfully.');
        } else {
            return redirect()->back()->withErrors(['password' => 'The password is incorrect.']);
        }
    }

    public function showReservation($id)
    {
        $areas        = Area::all();
        $event        = Event::where('id', $id)->first();
        $reservations = Reservation::where('event_id', $id)->paginate(10);
        $eventOwner   = auth()->guard('event_owner')->user();

        if ($eventOwner->id !== $event->event_owner_id) {
            return back();
        } else {
            return view('event-owners.reservations.show', compact('event', 'reservations', 'areas'));
        }
    }

    public function destroyReservation(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::guard('event_owner')->user();

        if (Hash::check($request->input('password'), $user->password)) {
            $reservation = Reservation::find($id);
            
            if (!$reservation) {
                return redirect()->back()->withErrors(['error' => 'Reservation not found.']);
            }
    
            $eventId = $reservation->event->id;
            $reservation->delete();
            
            return redirect()->route('reservation.show', $eventId)->with('success', 'Reservation deleted successfully.');
        } else {
            return redirect()->back()->withErrors(['password' => 'The password is incorrect.']);
        }
    }

    public function showUserReservation()
    {
        $areas        = Area::all();
        $id           = Auth::guard('web')->id();
        $reservations = Reservation::where('user_id', $id)->with('event')->paginate(10);

        foreach ($reservations as $reservation) {
            $currentParticipants = Reservation::where('event_id', $reservation->event_id)->sum('num_tickets');
            $reservation->maxAvailableTickets = $reservation->event->max_participants - $currentParticipants;
        }

        return view('users.reservations.show', compact('reservations', 'areas'));
    }

    public function destroyUserReservation(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::guard('web')->user();

        if (Hash::check($request->input('password'), $user->password)) {
            $this->reservation->destroy($id);
    
            return redirect()->route('user.reservation.show')->with('success', 'Reservation deleted successfully.');
        } else {
            return redirect()->back()->withErrors(['password' => 'The password is incorrect.']);
        }
    }

    public function updateUserReservation(Request $request, $id)
    {
        $request->validate([
            'num_tickets'      => 'required|integer|min:1',
            'reservation_date' => 'required|date',
            'time'             => 'required|date_format:H:i'
        ]);

        $reservation = Reservation::findOrFail($id);
        $event = Event::findOrFail($reservation->event_id);

        $currentParticipants = Reservation::where('event_id', $event->id)
                                        ->whereNull('deleted_at')
                                        ->sum('num_tickets');

        $totalParticipants = $currentParticipants - $reservation->num_tickets + $request->num_tickets;

        if ($totalParticipants > $event->max_participants) {
            return redirect()->back()->withErrors(['num_tickets' => 'The number of tickets exceeds the limit.']);
        }

        $reservation->num_tickets = $request->num_tickets;
        $reservation->reservation_date = $request->reservation_date;
        $reservation->time = $request->time;
        $reservation->save();

        return redirect()->back()->with('success', 'Reservation updated successfully!');
    }
}
