<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerPost')->name('register.post');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('login.post');
});
