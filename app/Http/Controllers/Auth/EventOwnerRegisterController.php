<?php

namespace App\Http\Controllers\Auth;

use App\Models\EventOwner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class EventOwnerRegisterController extends Controller
{
    use AuthenticatesUsers;

    protected $guardName = 'event_owner';

    protected $redirectTo = '/event-owner/top';

    public function __construct()
    {
        // $this->middleware('guest:event_owner');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6' ],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:event_owners'],
            'phone_number'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
            'avatar' => ['nullable', 'mimes:jpeg,jpg,png'],
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
            'password' => ['required', 'string', 'min:6' ],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:event_owners,users'],
            'phone_number'=>['required', 'string', 'max:255'],
            'address'=>['required', 'string', 'max:255'],
            'avatar' => ['nullable','file', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'role'=>'event-owner',
        ]);

        $base64Data = null;

        $base64Data = null;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            if ($file->isValid()) {
                $extension = $file->extension();
                $base64Data = 'data:image/' . $extension . ';base64,' . base64_encode(file_get_contents($file));
            } else {
                return back()->withErrors(['avatar' => 'Invalid file upload.']);
            }
        };

        $user = EventOwner::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'first_name' =>$validated['firstname'],
            'last_name' =>$validated['lastname'],
            'email' => $validated['email'],
            'phone_number' =>$validated['phone_number'],
            'address'=>$validated['address'],
            'avatar' => $base64Data,
            'role'=>'event-owner',

        ]);

        if(Auth::guard('event_owner')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            // Authentication successful
            return redirect()->intended($this->redirectTo);
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
