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
            'password' => ['required', 'string', 'min:6' ],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:event_owners,email', 'unique:users,email'],
            'avatar' => ['file', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'role'=>'user',
        ]);

        $base64Data = null;

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            if ($file->isValid()) {
                $extension = $file->extension();
                $base64Data = 'data:image/' . $extension . ';base64,' . base64_encode(file_get_contents($file));
            } else {
                return back()->withErrors(['avatar' => 'Invalid file upload.']);
            }
        }

        $user = User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'first_name' =>$validated['firstname'],
            'last_name' =>$validated['lastname'],
            'email' => $validated['email'],
            'avatar' => $base64Data,
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
