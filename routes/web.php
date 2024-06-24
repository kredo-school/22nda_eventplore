<?php

use Illuminate\Support\Facades\Route;

Route::get('/auth/event-owners/sign-in', function () {
    return view('auth.event-owners.sign-in');
});

// Example: I'm creating a dashboard from admin page. I'll declare the route like this

// Route::get('/admin/dashboard', function () {
//     return view('admin-dashboard');
// });
