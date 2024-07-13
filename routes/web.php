<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/user/sign-in', [LoginController::class, 'showSignIn'])->name('sign-in');
Route::post('/user/sign-in', [LoginController::class, 'signIn'])->name('login');
Route::get('/user/sign-up', [RegisterController::class, 'showSignUp'])->name('sign-up');
Route::post('/user/sign-up', [RegisterController::class, 'register'])->name('register');
Route::group(['middleware' => 'auth'], function(){ // auth middleware only allows logged-in users access
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/event-menu', [HomeController::class, 'show'])->name('event-menu');
    });
Route::get('/event-owners/events/register', [EventController::class, 'create'])->name('events.register');
Route::post('/event-owners/events/store', [EventController::class, 'store'])->name('events.store');
Route::get('/event-owners/session-id', [EventController::class, 'getSessionId']);

// Haruka
// Show sign-up page for event-owner
Route::get('/auth/event-owners/sign-up', function () {
    return view('auth.event-owners.sign-up');
});
// Show sign-in page for event-owner
Route::get('/auth/event-owners/sign-in', function () {
    return view('auth.event-owners.sign-in');
});
// Show sign-in page for user
Route::get('/auth/users/sign-in', function () {
    return view('auth.users.sign-in');
});
// Show sign-up page for user
Route::get('/auth/users/sign-up', function () {
    return view('auth.users.sign-up');
});
Route::get('/event-owners/events/edit', function () {
    return view('event-owners.events.edit');
});



// Naoki
// Show event page for event-owner
Route::get('/owners/show-events', function () {
    return view('event-owners.events.show');
});
// Show reservation page for event-owner
Route::get('/owners/reservation-list', function () {
    return view('event-owners.reservations.show');
});
// Show reservation page for user
Route::get('/user/reservation-list', function () {
    return view('users.reservations.show');
});
// Show event menu page
Route::get('/home/event-menu', function () {
    return view('home.event-menu');
});


// kanako
Route::get('/users/profile/show', function () {
    return view('users.profile.show');
});

Route::get('/event-owners/profile/show', function () {
    return view('event-owners.profile.show');
});

//Marika
Route::get('/home/show-event', function () {
    return view('home.show-event');
});

?>

