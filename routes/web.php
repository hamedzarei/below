<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/verify/{email}/{code}', function ($email, $code) {
    return view('verify', [
        'code' => $code,
        'email' => $email
    ]);
});

Route::get('/register/{code}', function ($code) {
    return view('register', [
        'code' => $code
    ]);
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
    return view('admin');
});
