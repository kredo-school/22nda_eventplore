<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\EventOwner;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EventOwnerRegisterController extends Controller
{
    use AuthenticatesUsers;

    protected $guardName = 'event_owner';

    protected $redirectTo = '/event-menu';

    public function __construct()
    {
        // $this->middleware('guest:event_owner');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8' ],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:event_owners'],
            'phone_number'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
            'role'=>'event-owner',
        ]);
    }


        /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\EventOwner
     */
    public function eventownerRegister(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8' ],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:event_owners'],
            'phone_number'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
            'role'=>'event-owner',
        ]);

        $avatar = base64_encode($request['avatar']);
        $user = EventOwner::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'first_name' =>$validated['firstname'],
            'last_name' =>$validated['lastname'],
            'email' => $validated['email'],
            'phone_number' =>$validated['phone_number'],
            'address'=>$validated['address'],
            'avatar' => $avatar,
            'role'=>'event-owner',

        ]);
        if(Auth::guard('event_owner')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
        // Authentication successful
        return redirect('/event-menu');
        } else {
        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
        }

    }

    public function showEventOwnerSignUp()
    {
        return view('auth.event-owners.sign-up');
    }


}
