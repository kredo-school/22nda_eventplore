<?php

namespace App\Http\Controllers\Auth;

use App\Models\Area;
use App\Http\Controllers\Auth\User;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
            'email' => 'required|max:255|exists:users,email',
            'password' => 'required|min:6',
        ], [
            'email.exists' => 'The email does not exist in our records.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            if (Auth::guard('web')->user()->role == 'user') {
                return redirect()->intended($this->redirectTo);
            } else {
                // roleがuserではないとき
                return back()->withInput($request->only('email'))->withErrors([
                    'email' => 'These credentials do not match our records.',
                ]);
            }
        } else {
            // 認証が失敗したとき
            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'These credentials do not match our records.',
            ]);
        }
    }

        public function showProfile()
    {
        $areas = Area::all();
        $user = ModelsUser::find(auth()->id());

        $reservations = $user->reservations; // ユーザーの予約全てを取得

        $reservationCount = $user->reservations()->count(); // ユーザーの予約数をカウント
        $commentCount = Review::where('user_id', $user->id)->count(); // コメント数のカウント

        return view('users.profile.show', compact('areas', 'user', 'reservationCount', 'commentCount', 'reservations'));
    }

    public function update(Request $request)
    {
        $user = ModelsUser::find(auth()->id());

        $user->username = $request->input('username', $user->username);
        $user->first_name = $request->input('first_name', $user->first_name);
        $user->last_name = $request->input('last_name', $user->last_name);

        if ($request->hasFile('avatar')) {
            $avatarFile = $request->file('avatar');
            $avatarData = file_get_contents($avatarFile);
            $user->avatar = 'data:image/' . $avatarFile->extension() . ';base64,' . base64_encode($avatarData);
        }

        $user->save();

        return redirect()->route('users.profile.show');
    }


    public function showReservations()
    {
        $areas = Area::all();
        return view('users.reservations.show', compact('areas'));
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.sign-in');
    }

    public function destroy(Request $request)
    {
        $user = AuthUser::find(auth()->id());

        if (Hash::check($request->password, $user->password)) {

            $user->delete();

            // ログアウト処理
            Auth::guard('web')->logout();

            // セッションの無効化とトークンの再生成
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('user.sign-in');
        } else {
            // パスワードが一致しない場合
            return back()->withErrors([
                'password' => 'The entered password is incorrect.',
            ])->withInput();
        }
    }
}
