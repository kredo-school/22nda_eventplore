<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EventOwnerLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/event-menu';

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

    public function signIn(Request $request)
    {
        $event_login = $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('event_owner')->attempt($event_login)) {
            if (Auth::guard('event_owner')->user()->role == 'event-owner') {
                return redirect()->intended($this->redirectTo);
            } else {
                return back()->withInput($request->only('email'))->withErrors([
                    'email' => 'These credentials do not match our records',
                ]);
            }
        } else {
            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'These credentials do not match our records',
            ]);
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('event_owner')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('event-owner.sign-in');
    }

}
