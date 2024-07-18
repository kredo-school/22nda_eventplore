<?php

namespace App\Http\Controllers\Auth;

use App\Models\Area;
use App\Models\Category;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = '/';


    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }

    public function showUserSignIn()
    {
        return view('auth.users.sign-in');
    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    public function userSignIn(Request $request)
    {
        $event_login = $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('web')->attempt($event_login)) {
            if (Auth::guard('web')->user()->role == 'user') {
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

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.sign-in');
    }



}
