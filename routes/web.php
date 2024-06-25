<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/auth/event-owners/sign-in', function () {
    return view('auth.event-owners.sign-in');
});

Route::get('/reservation-list', function () {
    return view('event-owners.reservations.show');
});

?>