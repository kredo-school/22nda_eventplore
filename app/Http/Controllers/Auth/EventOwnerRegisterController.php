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

    protected $redirectTo = '/owners/show-events';

    public function __construct()
    {
        $this->middleware('guest:event_owner');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8' ],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
        ]);
    }


        /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\EventOwner
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8' ],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
        ]);

        $avatar = base64_encode($request['avatar']);
        EventOwner::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'first_name' =>$validated['firstname'],
            'last_name' =>$validated['lastname'],
            'email' => $validated['email'],
            'phone_number' =>$validated['phone_number'],
            'address'=>$validated['address'],
            'avatar' => $avatar

        ]);
        if (Auth::guard('event_owner')->attempt([
            'email' =>$validated['email'],
            'password' => $validated['password'],
        ])) {
            return view('event-owners.events.show');
        }
        return Redirect::back();
    }

    public function showEventOwnerSignUp()
    {
        return view('auth.event-owners.sign-up');
    }


}
