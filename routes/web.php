<?php

use Illuminate\Support\Facades\Route;

Route::get('/auth/event-owners/sign-up', function () {
    return view('auth.event-owners.sign-up');
});

?>
