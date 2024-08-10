<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Event;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $eventId)
    {
        $request->validate([
            'star' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ], [
            'comment.max' => 'The comment may not be greater than :max characters.',
        ]);

        $event = Event::with('reviews.user')->findOrFail($eventId);

        Review::create([
            'event_id' => $event->id,
            'user_id' => Auth::id(),
            'star' => $request->star,
            'comment' => $request->comment,
        ]);

        return redirect()->back();
    }

    public function show()
    {
        $areas   = Area::all();
        $userId = Auth::id();
        $reviews = Review::where('user_id', $userId)->with('event')->paginate(10);

        return view('users.comments.show', compact('areas', 'reviews'));
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }


}
