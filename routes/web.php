<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getUser', [UserController::class, 'getUser']);
Route::get('/getUsers/{id}', [UserController::class, 'getUsers']);