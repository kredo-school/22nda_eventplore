<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
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
    protected $redirectTo = '/';

    /**
     * Where to redirect event owners after login.
     *
     * @var string
     */
    protected $ownerRedirectTo = '/event-owners/show';


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

    public function userSignIn(Request $request)
    {
        $this->redirectTo = '/home';
        return $this->login($request);
    }


    public function showOwnerSignIn()
    {
        return view('auth.event-owners.sign-in');
    }

    public function ownerSignIn(Request $request)
    {
        $this->redirectTo = '/event-owners/show';
        return $this->login($request);
    }
}
