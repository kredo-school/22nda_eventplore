<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Models\EventOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/sign-in';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8' ],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // $avatar = base64_encode($data['avatar']);
        $user = User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'first_name' =>$data['firstname'],
            'last_name' =>$data['lastname'],
            'email' => $data['email'],

        ]);

        if (isset($data['avatar'])) {
            $user->avatar = 'data:image/' . $data['avatar']->extension() . ';base64,' . base64_encode(file_get_contents($data['avatar']));
            $user->save();
        }
        return $user;
    }

    public function showSignUp()
    {
        return view('auth.users.sign-up');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $data = $request->all();
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar');
        }

        $user = $this->create($data);
        // return redirect($this->redirectPath());

        if(Auth::guard('user')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
        // Authentication successful
        $areas = Area::all();
        $categories = Category::all();

        return view('home.home', compact('areas', 'categories'));
        } else {
        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
        }

    }

}
