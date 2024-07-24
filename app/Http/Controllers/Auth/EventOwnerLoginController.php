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

        return view('event-owners.profile.show', compact('areas'));
    }

    public function eventownerLogout(Request $request)
    {
        Auth::guard('event_owner')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('event-owner.sign-in');
    }

}
