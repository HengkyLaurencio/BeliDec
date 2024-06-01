<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getUser', [UserController::class, 'getUser'])->name('getUser');
Route::get('/getUsers/{id}', [UserController::class, 'getUsers']);
Route::get('/getUser/{user}/editUser', [UserController::class, 'editUser'])->name('editUser');
Route::put('/getUser/{user}/updateUser', [UserController::class, 'updateUser'])->name('updateUser');
Route::delete('/getUser/{user}/deleteUser', [UserController::class, 'deleteUser'])->name('deleteUser');

