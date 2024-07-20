<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Models\EventOwner;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use AuthenticatesUsers;


    protected $guardName = 'web';

    protected $redirectTo = '/';

    public function __construct()
    {
        // $this->middleware('guest');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function userRegister(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8' ],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'avatar' => ['nullable', 'mimes:jpeg,jpg,png'],
            'role'=>'user',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarPath = 'data:image/' . $avatar->extension() . ';base64,' . base64_encode(file_get_contents($avatar));
        }

        $user = User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'first_name' =>$validated['firstname'],
            'last_name' =>$validated['lastname'],
            'email' => $validated['email'],
            'avatar' => $avatarPath,
            'role'=>'user',
        ]);
        if(Auth::guard('web')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
            // Authentication successful
            return redirect()->intended($this->redirectTo);
        } else {
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid credentials']);
        }


    }


    public function showUserSignUp()
    {
        return view('auth.users.sign-up');
    }


}
