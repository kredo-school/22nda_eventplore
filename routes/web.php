<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\EventOwnerLoginController;
use App\Http\Controllers\Auth\EventOwnerRegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ReviewController;


Route::get('/event-owners/events/register', [EventController::class, 'create'])->name('events.register');
Route::post('/event-owners/events/store', [EventController::class, 'store'])->name('events.store');
Route::get('/event-owners/session-id', [EventController::class, 'getSessionId']);

Route::get('/guideline', [HomeController::class, 'guideline'])->name('gudeline');
Route::get('/show-event/{id}', [HomeController::class, 'showEvent'])->name('show-event');
Route::post('/events/{event}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/show-event/{id}', [HomeController::class, 'showEvent'])->name('show-event');


// ユーザーのサインアップ
Route::get('/user/show-sign-up', [UserRegisterController::class, 'showUserSignUp'])->name('user.sign-up');
Route::post('/user/sign-up', [UserRegisterController::class, 'userRegister'])->name('user.register');
// ユーザーのサインイン
Route::get('/user/show-sign-in', [UserLoginController::class, 'showUserSignIn'])->name('user.sign-in');
Route::post('/user/login', [UserLoginController::class, 'userSignIn'])->name('user.login');
Route::post('/user/logout', [UserLoginController::class, 'userLogout'])->name('user.logout');
// イベントオーナーのサインアップ
Route::get('/event-owner/show-sign-up',[EventOwnerRegisterController::class, 'showEventOwnerSignUp'])->name('event-owner.sign-up');
Route::post('/event-owner/sign-up',[EventOwnerRegisterController::class, 'eventownerRegister'])->name('event-owner.register');
// イベントオーナーのサインイン
Route::get('/event-owner/show-sign-in', [EventOwnerLoginController::class, 'showEventOwnerSignIn'])->name('event-owner.sign-in');
Route::post('/event-owner/sign-in', [EventOwnerLoginController::class, 'eventownerSignIn'])->name('event-owner.login');
Route::post('/event-owner/logout', [EventOwnerLoginController::class, 'eventownerLogout'])->name('event-owner.logout');
// ユーザーとゲストのメインビュー
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event-menu', [HomeController::class, 'show'])->name('event-menu');

//navとHamburgerからのsearch
Route::get('/events/search', [HomeController::class, 'search'])->name('events.search');
//nav categoryからのsearch
Route::get('/category/search', [HomeController::class, 'searchFromCategory'])->name('category.search');



// ユーザー認証後に見れる画面
    Route::middleware(['auth:web'])->group(function () {
        //プロフィール
        Route::get('/users/profile/show', [UserLoginController::class, 'showProfile'])->name('users.profile.show');
        Route::patch('/users/profile/update', [UserLoginController::class, 'update'])->name('users.profile.update');
        Route::delete('/users/delete', [UserLoginController::class, 'destroy'])->name('users.delete');

        Route::get('/user/reservation-list', [UserLoginController::class, 'showReservations'])->name('user.reservation.list');
        Route::get('/user/reservation', [EventController::class, 'showUserReservation'])->name('user.reservation.show');
        Route::delete('/user/reservation/{id}/destroy', [EventController::class, 'destroyUserReservation'])->name('user.reservation.destroy');
        Route::patch('/user/reservation/{id}/update', [EventController::class, 'updateUserReservation'])->name('user.reservation.update');
    });

// イベントオーナー認証後に見れる画面
    Route::middleware(['auth:event_owner'])->group(function () {
        // イベントオーナーのメインビュー
        Route::get('/event-owner/top', [EventController::class, 'index'])->name('event-list.show');
        Route::delete('/event/{id}/destroy', [EventController::class, 'destroy'])->name('events.destroy');
        Route::get('/event-owner/reservation/{id}', [EventController::class, 'showReservation'])->name('reservation.show');
        Route::delete('/event-owner/reservation/{id}/destroy', [EventController::class, 'destroyReservation'])->name('reservation.destroy');
        //プロフィール
        Route::get('/event-owners/profile/show', [EventOwnerLoginController::class, 'showProfile'])->name('event-owners.profile.show');
        Route::patch('/event-owner/profile/update', [EventOwnerLoginController::class, 'update'])->name('event-owners.profile.update');
        Route::delete('/event-owner/delete', [EventOwnerLoginController::class, 'destroy'])->name('event-owner.delete');

        Route::get('/event-owners/events/register', [EventController::class, 'create'])->name('events.register');
        Route::post('/event-owners/events/store', [EventController::class, 'store'])->name('events.store');
        Route::get('/event-owners/session-id', [EventController::class, 'getSessionId']);
        Route::get('/event-owners/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
        Route::patch('/event-owners/events/{id}/update', [EventController::class, 'update'])->name('events.update');
        Route::delete('/event-owners/images/{id}', [EventController::class, 'destroyImage'])->name('event-image.destroy');
    });



// パスワードのリセット関係
// パスワードリセットリンクのリクエストフォームを表示
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// パスワードリセットリンクをメールで送信する
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// パスワードのリセットリンクを表示
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// パスワードリセットを処理
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');



// パスワードのリセット関係
// パスワードリセットリンクのリクエストフォームを表示
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// パスワードリセットリンクをメールで送信する
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// パスワードのリセットリンクを表示
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// パスワードリセットを処理
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');



// パスワードのリセット関係
// パスワードリセットリンクのリクエストフォームを表示
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
// パスワードリセットリンクをメールで送信する
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
// パスワードのリセットリンクを表示
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
// パスワードリセットを処理
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');



// Haruka
// Show sign-up page for event-owner
// Route::get('/auth/event-owners/sign-up', function () {
//     return view('auth.event-owners.sign-up');
// });
// Show sign-in page for event-owner
// Route::get('/auth/event-owners/sign-in', function () {
//     return view('auth.event-owners.sign-in');
// });
// Show sign-in page for user
// Route::get('/auth/users/sign-in', function () {
//     return view('auth.users.sign-in');
// });
// Show sign-up page for user
// Route::get('/auth/users/sign-up', function () {
//     return view('auth.users.sign-up');
// });
// Route::get('/event-owners/events/edit', function () {
//     return view('event-owners.events.edit');
// });



// Naoki
// Show event page for event-owner
// Route::get('/owners/show-events', function () {
//     return view('event-owners.events.show');
// });
// Show reservation page for event-owner
// Route::get('/owners/reservation-list', function () {
//     return view('event-owners.reservations.show');
// });
// Show reservation page for user
// Route::get('/user/reservation-list', function () {
//     return view('users.reservations.show');
// });


// kanako
// Route::get('/users/profile/show', function () {
//     return view('users.profile.show');
// });

// Route::get('/event-owners/profile/show', function () {
//     return view('event-owners.profile.show');
// });

//Marika
// Route::get('/home/show-event', function () {
//     return view('home.show-event');
// });

?>

