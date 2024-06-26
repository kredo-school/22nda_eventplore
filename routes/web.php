<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/auth/users/sign-up', function () {
    return view('auth.users.sign-up');
});

?>
