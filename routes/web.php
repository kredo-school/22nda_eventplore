<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', )->name('home');

Route::get('/event-owner/reservations', function () {
    return view('event-owners.reservations.show');
});

// Example: I'm creating a dashboard from admin page. I'll declare the route like this

// Route::get('/admin/dashboard', function () {
//     return view('admin-dashboard');
// });
