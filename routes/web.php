<?php

use App\Http\Controllers\Auth\EventOwnerLoginController;
use App\Http\Controllers\Auth\EventOwnerRegisterController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;



// Route::group(['middleware' => 'auth'], function(){ // auth middleware only allows logged-in users access
//         Route::get('/', [HomeController::class, 'index'])->name('home');
//         Route::get('/event-menu', [HomeController::class, 'show'])->name('event-menu');
//         Route::get('/event-owners/sign-in',[EventOwnerLoginController::class, 'showEventOwnerSignIn'])->name('event-owner.sign-in')->middleware('guest:event_owner');
//         Route::get('/user/sign-in', [UserLoginController::class, 'showUserSignIn'])->name('user.sign-in');
//     });

    Route::middleware(['auth'])->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/event-menu', [HomeController::class, 'show'])->name('event-menu');
        Route::post('/logout', [UserLoginController::class, 'logout'])->name('logout');


        Route::middleware('guest:event_owner')->group(function () {
            Route::get('/event-owners/sign-in', [EventOwnerLoginController::class, 'showEventOwnerSignIn'])->name('event-owner.sign-in');

        });
    });
Route::get('/event-owners/events/register', [EventController::class, 'create'])->name('events.register');
Route::post('/event-owners/events/store', [EventController::class, 'store'])->name('events.store');
Route::get('/event-owners/session-id', [EventController::class, 'getSessionId']);

    Route::middleware(['guest'])->group(function () {

        Route::get('/user/sign-up', [UserRegisterController::class, 'showSignUp'])->name('user.sign-up');
        Route::post('/user/sign-up', [UserRegisterController::class, 'register'])->name('user.register');

        Route::get('/user/sign-in', [UserLoginController::class, 'showUserSignIn'])->name('user.sign-in');
        Route::post('/user/sign-in', [UserLoginController::class, 'signIn'])->name('user.login');


        Route::get('/event-owners/sign-up',[EventOwnerRegisterController::class, 'showEventOwnerSignUp'])->name('event-owner.sign-up');
        Route::post('/event-owners/sign-up',[EventOwnerRegisterController::class, 'register'])->name('event-owner.register');


    });





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

