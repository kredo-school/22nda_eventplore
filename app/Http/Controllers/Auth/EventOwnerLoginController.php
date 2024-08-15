<?php

namespace App\Http\Controllers\Auth;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\EventOwner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;


class EventOwnerLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/event-owner/top';

    public function __construct()
    {
        // $this->middleware('guest:event_owner')->except('logout');
    }


    public function showEventOwnerSignIn()
    {
        return view('auth.event-owners.sign-in');
    }

    protected function guard()
    {
        return Auth::guard('event_owner'); // event_owner guard を使用
    }

    public function eventownerSignIn(Request $request)
    {
        $request->validate([
            'email' => 'required|max:255|exists:event_owners,email',
            'password' => 'required|min:6',
        ], [
            'email.exists' => 'The email does not exist in our records.',
        ]);

        $credentials = $request->only('email', 'password');
        
        // userでログインしている場合、ログアウトさせる
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if (Auth::guard('event_owner')->attempt($credentials)) {
            if (Auth::guard('event_owner')->user()->role == 'event-owner') {
                return redirect()->intended($this->redirectTo);
            } else {
                // roleがevent_ownerではない時
                return back()->withInput($request->only('email'))->withErrors([
                    'email' => 'These credentials do not match our records',
                ]);
            }
        } else {
            // 認証が失敗したとき
            return back()->withInput($request->only('email'))->withErrors([
                'email' => 'These credentials do not match our records',
            ]);
        }

    }

    public function showProfile()
    {
        $areas = Area::all();
        $user = EventOwner::find(auth()->id());

        $eventCount = $user->events()->count();
        return view('event-owners.profile.show', compact('areas', 'user', 'eventCount'));
    }

    public function update(Request $request)
    {
        $eventOwner = EventOwner::find(auth()->id());

        $eventOwner->username = $request->input('username');
        $eventOwner->first_name = $request->input('first_name');
        $eventOwner->last_name = $request->input('last_name');
        $eventOwner->address = $request->input('address');
        $eventOwner->phone_number = $request->input('phone_number');
        $eventOwner->email = $request->input('email');

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            if ($file->isValid()) {
                $extension = $file->extension();
                $base64Data = 'data:image/' . $extension . ';base64,' . base64_encode(file_get_contents($file));
                $eventOwner->avatar = $base64Data;
            }
        }

        $eventOwner->save();

        return redirect()->route('event-owners.profile.show');
    }

    public function eventownerLogout(Request $request)
    {
        Auth::guard('event_owner')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('event-owner.sign-in');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $eventOwner = EventOwner::find(auth()->id());

        if (Hash::check($request->input('password'), $eventOwner->password)) {

            // 関連するイベントを削除
            $eventOwner->events()->each(function ($event) {
                $event->delete();
            });
            $eventOwner->delete();

            // ログアウト処理
            Auth::guard('event_owner')->logout();
            // セッションの無効化とトークンの再生成
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route('event-owner.sign-in');
        } else {
            // パスワードが一致しない場合
            return back()->withErrors([
                'password' => 'The entered password is incorrect, try it again.',
            ])->withInput();
        }
    }

}
