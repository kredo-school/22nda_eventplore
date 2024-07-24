<?php

namespace App\Http\Controllers\Auth;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class EventOwnerLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/event-owner/top';

    public function __construct()
    {
        // $this->middleware('guest:event_owner')->except('logout');
    }


    public function showEventOwnerSignIn()
    {
        return view('auth.event-owners.sign-in');
    }

    protected function guard()
    {
        return Auth::guard('event_owner'); // event_owner guard を使用
    }

    public function eventownerSignIn(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255|exists:event_owners,email',
            'password' => 'required|min:6',
        ], [
            'email.exists' => 'The email does not exist in our records.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('event_owner')->attempt($credentials)) {
            if (Auth::guard('event_owner')->user()->role == 'event-owner') {
                return redirect()->intended($this->redirectTo);
            } else {
                // roleがevent_ownerではない時
                return back()->withInput($request->only('email'))->withErrors([
                    'email' => 'These credentials do not match our records',
                ]);
            }
        } else {
            // 認証が失敗したとき
            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'These credentials do not match our records',
            ]);
        }

    }

    public function showProfile()
    {
        $areas = Area::all();
        $user = Auth::guard('event_owner')->user();
        $eventCount = $user->events()->count();
        return view('event-owners.profile.show', compact('areas', 'user', 'eventCount'));
    }

    public function update(Request $request)
    {
        // $request->validate([
        //     'username' => ['required', 'string', 'max:255'],
        //     'first_name' => ['required', 'string', 'max:255'],
        //     'last_name' => ['required', 'string', 'max:255'],
        //     'address' => ['nullable', 'string', 'max:255'],
        //     'phone_number' => ['nullable', 'numeric'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:event_owners,email,' . Auth::id()],
        //     'avatar' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        // ]);

        $eventOwner = Auth::user();

        $eventOwner->username = $request->input('username');
        $eventOwner->first_name = $request->input('first_name');
        $eventOwner->last_name = $request->input('last_name');
        $eventOwner->address = $request->input('address');
        $eventOwner->phone_number = $request->input('phone_number');
        $eventOwner->email = $request->input('email');

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            if ($file->isValid()) {
                $extension = $file->extension();
                $base64Data = 'data:image/' . $extension . ';base64,' . base64_encode(file_get_contents($file));
                $eventOwner->avatar = $base64Data;
            }
        }

        $eventOwner->save();

        return redirect()->route('event-owners.profile.show');
    }

    public function eventownerLogout(Request $request)
    {
        Auth::guard('event_owner')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('event-owner.sign-in');
    }

}
