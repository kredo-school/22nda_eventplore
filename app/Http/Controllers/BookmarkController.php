<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Event;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    private $bookmark;
    private $event;

    public function __construct(Bookmark $bookmark, Event $event)
    {
        $this->bookmark = $bookmark;
        $this->event = $event;
    }

    public function show()
    {
        $areas = Area::all();

        $events = Event::all();

        $bookmarked_events = Event::whereHas('bookmarks', function ($query) {
            $query->where('user_id', Auth::guard('web')->id());
        })
        ->orderBy('start_date', 'desc') // 開催日が遅い順に並び替え
        ->paginate(6);
    
        $hasBookmarkedEvents = $bookmarked_events->isNotEmpty();
    
        return view('users.bookmark.show', compact('bookmarked_events', 'hasBookmarkedEvents', 'areas'));
    }

    public function store($event_id){
        $this->bookmark->user_id = Auth::guard('web')->id();
        $this->bookmark->event_id = $event_id;
        $this->bookmark->save();

        return redirect()->back();
    }

    public function destroy($event_id){
        $this->bookmark->where('user_id', Auth::guard('web')->id())
                    ->where('event_id', $event_id)
                    ->delete();
        return redirect()->back();
    }
}
