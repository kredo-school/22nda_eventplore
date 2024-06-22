<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;




// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/layouts/app', function () {
    return view('layouts.app');
});
