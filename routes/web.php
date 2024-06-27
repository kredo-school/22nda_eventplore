<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/auth/event-owners/sign-up', function () {
    return view('auth.event-owners.sign-up');
});


Route::get('/auth/event-owners/sign-in', function () {
    return view('auth.event-owners.sign-in');
});
Route::get('/auth/users/sign-up', function () {
    return view('auth.users.sign-up');
});


// Naoki
Route::get('/owners/show-events', function () {
    return view('event-owners.events.show');
});
Route::get('/owners/reservation-list', function () {
    return view('event-owners.reservations.show');
});
Route::get('/user/reservation-list', function () {
    return view('users.reservations.show');
});
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



?>

