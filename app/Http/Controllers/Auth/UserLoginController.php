<?php

namespace App\Http\Controllers\Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showUserSignIn()
    {
        return view('auth.users.sign-in');
    }

    public function signIn(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required|min:8',
        ]);

        if (Auth::guard('web')->attempt($request->only('username', 'password'))) {
            return view('home.home');
        }

        return back()->withInput($request->only('username'))->withErrors([
            'username' => 'These credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.sign-in');
    }



}
