<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

// Haruka
// Show sign-in page for event-owner
Route::get('/auth/event-owners/sign-up', function () {
    return view('auth.event-owners.sign-up');
});

Route::get('/auth/event-owners/sign-in', function () {
    return view('auth.event-owners.sign-in');
});
// Show sign-in page for user
Route::get('/auth/users/sign-in', function () {
    return view('auth.users.sign-in');
});
// Show sign-up page for event-owner
Route::get('/auth/event-owners/sign-up', function () {
    return view('auth.event-owners.sign-up');
});
// Show sign-up page for user
Route::get('/auth/users/sign-up', function () {
    return view('auth.users.sign-up');
});
// Show register event page
Route::get('/event-owners/events/register', function () {
    return view('event-owners.events.register');
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

Route::get('/home/guideline', function () {
    return view('home.guideline');
});

//Marika
Route::get('/home/show-event', function () {
    return view('home.show-event');
});

?>

