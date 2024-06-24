<?php

use Illuminate\Support\Facades\Route;

// Example: I'm creating a dashboard from admin page. I'll declare the route like this

// Route::get('/admin/dashboard', function () {
//     return view('admin-dashboard');
// });

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/show-events', function () {
    return view('event-owners.events.show');
});

Route::get('/auth/event-owners/sign-in', function () {
    return view('auth.event-owners.sign-in');
});

?>