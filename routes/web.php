<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

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


?>

