<?php

use Illuminate\Support\Facades\Route;

Route::get('/layouts/app', function () {
    return view('layouts.app');
});
