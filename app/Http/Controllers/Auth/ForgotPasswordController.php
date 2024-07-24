<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    // リセットリンク送信フォームを表示
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // リセットリンクをメールで送信
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        // ここでリセットリンクをメールで送信
        $response = Password::sendResetLink($request->only('email'));

        // リセットリンク送信の結果に応じてリダイレクトかエラーメッセージを表示
        return $response == Password::RESET_LINK_SENT
                    ? back()->with('status', Lang::get($response))
                    : back()->withErrors(['email' => Lang::get($response)]);
    }
}
