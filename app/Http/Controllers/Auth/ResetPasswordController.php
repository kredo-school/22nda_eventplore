<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/user/show-sign-in';

    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->input('email')]
        );
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'token' => 'required'
        ]);
    }

    public function reset(Request $request)
    {
        // _token を除外したデータを取得
        $data = $request->except('_token');
        // バリデーション機能
        $this->validator($data)->validate();

        // Password::reset メソッドを使用してリセット処理を行う
        $response = Password::reset($data, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });
        // リセット結果に基づいて
        return $response == Password::PASSWORD_RESET
        // 成功したらリダイレクト
                    ? redirect($this->redirectPath())->with('status', __($response))
        // 失敗したらエラーメッセージを表示
                    : back()->withErrors(['email' => __($response)]);
    }




}
