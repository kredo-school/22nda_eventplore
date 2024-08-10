<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Event;
use App\Models\Category;
use App\Models\EventImage;
use App\Models\Reservation;
use Illuminate\Validation\Rule;
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
        return view('event-owners.events.register', compact('areas', 'categories'));
    }

    public function getSessionId(){
        $session = Session::getId();
        return response()->json($session);
    }

    public function store(Request $request){
    // Validation rules
    $validatedData = $request->validate([
        'event_name' => 'required|string|max:50',
        'start_date' => 'required|date',
        'finish_date' => 'required|date|after_or_equal:start_date',
        'start_time' => 'required|date_format:H:i',
        'finish_time' => 'required|date_format:H:i|after:start_time',
        'details' => 'required|string',
        'history' => 'required|string',
        'max_participants' => 'required|integer|min:1',
        'app_deadline' => 'required|date',
        'price' => 'required|integer|min:0',
        'area_id' => 'required|exists:areas,id',
        'address' => 'required|string|max:255',
        'parking' => 'required|string',
        'train' => 'required|string',
        'toilet' => 'required|string',
        'weather' => 'required|string',
        'category' => 'required|exists:categories,id',
        'add_info' => 'required|string',
        'facebook_link' => 'nullable|url',
        'insta_link' => 'nullable|url',
        'x_link' => 'nullable|url',
        'official' => 'nullable|url',
        'image' => 'array', // 画像のバリデーション（配列であること）
        'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // 各画像ファイルのバリデーション
    ]);

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

        // 保存したイベントに関連する画像の処理
        $event_images = [];
        if($request->hasFile('image')) {
            foreach($request->file("image") as $img){
                $image = new EventImage();
                $image->image = "data:image/" . $img->getClientOriginalExtension() .
                ";base64," . base64_encode(file_get_contents($img));
                $image->event_id = $event->id;
                $event_images[] = ['image' => $image->image, 'event_id' => $event->id];
            }
            $event->eventImages()->createMany($event_images);
        }

        $event_categories = [];
        foreach($request->categories as $category_id){
            $event_categories [] = ['category_id' => $category_id,'event_id' => $event->id];
        }
        $event->eventCategories()->createMany($event_categories);
        return redirect()->route('event-list.show');
    }

    public function edit($id)
    {
        $event_a = $this->event->findOrFail($id);
        $all_categories = $this->category->all();
        $areas = Area::all(); // ここで全てのエリアを取得
        $categories = Category::all();
        $images = EventImage::where('event_id', $id)->orderBy('id', 'asc')->get(); // ここで画像を取得

        $selected_categories = [];
        foreach($event_a->eventCategories as $event_category){
            $selected_categories[] = $event_category->category_id;
        }

        return view('event-owners.events.edit')->with([
            'event' => $event_a,
            'all_categories' => $all_categories,
            'selected_categories' => $selected_categories,
            'areas' => $areas, // ここでビューにエリアを渡す
            'images' => $images, // ここでビューに画像を渡す
            'categories' => $categories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $event_a = $this->event->findOrFail($id);

        $event_a->event_name = $request->event_name;
        $event_a->start_date = $request->start_date;
        $event_a->start_time = $request->start_time;
        $event_a->finish_date = $request->finish_date;
        $event_a->finish_time = $request->finish_time;
        $event_a->details = $request->details;
        $event_a->history = $request->history;
        $event_a->max_participants = $request->max_participants;
        $event_a->app_deadline = $request->app_deadline;
        $event_a->price = $request->price;
        $event_a->area_id = $request->area_id;
        $event_a->address = $request->address;
        $event_a->parking = $request->parking;
        $event_a->train = $request->train;
        $event_a->toilet = $request->toilet;
        $event_a->weather = $request->weather;
        $event_a->category_id = $request->category;
        $event_a->add_info = $request->add_info;
        $event_a->facebook_link = $request->facebook_link;
        $event_a->insta_link = $request->insta_link;
        $event_a->x_link = $request->x_link;
        $event_a->official = $request->official;
        $event_a->event_owner_id = Auth::id();
        $event_a->latitude = $request->latitude;
        $event_a->longitude = $request->longitude;
        $event_a->save();

        /**
         * TODO:
         *
         * 1. Get the images
         * 2. Update the images
         * 3. Uplaod image if it doesn't exist
         */
        // 画像の更新処理
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $img) {
                if ($img) {
                    // 既存の画像を更新
                    $otherImages = $event_a->eventImages->slice(1);
                    if($key == 0){
                        $otherImages = $event_a->eventImages;
                    }
                    $image = EventImage::where('id', $otherImages[$key]->id)->where('event_id', $event_a->id)->first();
                    if ($image) {
                        $image->image = "data:image/" . $img->getClientOriginalExtension() . ";base64," . base64_encode(file_get_contents($img));
                        $image->save();
                    }
                }
            }
        }

        if ($request->hasFile('new-image')) {
            foreach ($request->file('new-image') as $newImg) {
                if ($newImg) {
                    $newImage = new EventImage();
                    $newImage->image = "data:image/" . $newImg->getClientOriginalExtension() . ";base64," . base64_encode(file_get_contents($newImg));
                    $newImage->event_id = $event_a->id;
                    $newImage->save();
                }
            }
        }

        $event_a->eventCategories()->delete();

        $event_categories = [];
        foreach ($request->categories as $category_id) {
            $event_categories[] = ['category_id' => $category_id, 'event_id' => $event_a->id];
        }
        $event_a->eventCategories()->createMany($event_categories);

        return redirect()->route('event-list.show');
    }

    public function destroyImage($id)
    {
        $image = EventImage::findOrFail($id);
        $image->delete();  // データベースから画像を削除

        return response()->json(['message' => 'Image deleted successfully'], 200);
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


        // 分析グラフのパート
        $maxParticipants  = $event->max_participants;
        // 開始時間と終了時間を取得
        $startTime = strtotime($event->start_time);
        $endTime   = strtotime($event->finish_time);

        // 時間帯ごとの集計を初期化
        $timeSlots = [];
        for ($time = $startTime; $time <= $endTime; $time = strtotime('+1 hour', $time)) {
            $formattedTime = date('H:00', $time);
            $timeSlots[$formattedTime] = 0;
        }

        // 各予約について人数を時間帯ごとにカウント
        $allReservations = Reservation::where('event_id', $id)->get();
        foreach ($allReservations as $reservation) {
            $reservationTime = strtotime($reservation->time);
            $timeSlot = date('H:00', $reservationTime);
            if (isset($timeSlots[$timeSlot])) {
                $timeSlots[$timeSlot] += $reservation->num_tickets;
            }
        }
        if ($eventOwner->id !== $event->event_owner_id) {
            return back();
        } else {
            return view('event-owners.reservations.show', compact('event', 'reservations', 'areas', 'timeSlots', 'maxParticipants'));
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
