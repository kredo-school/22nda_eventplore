<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventOwnerLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/event-owners/sign-in'; // イベントオーナー用のリダイレクト先

    public function __construct()
    {
        $this->middleware('guest:event_owner')->except('logout');
    }


    public function showEventOwnerSignIn()
    {
        return view('auth.event-owners.sign-in');
    }

    protected function guard()
    {
        return Auth::guard('event_owner'); // event_owner guard を使用
    }
}
