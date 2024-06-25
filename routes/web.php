<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/auth/event-owners/sign-up', function () {
    return view('auth.event-owners.sign-up');
});


Route::get('/users/profile/show', function () {
    return view('users.profile.show');
});

