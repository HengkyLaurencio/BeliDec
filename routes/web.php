<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerPost')->name('register.post');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('login.post');
    Route::get('/logout', 'logout')->name('logout');
});

Route::get('/getUser', [UserController::class, 'getUser'])->name('getUser');
Route::get('/getUsers/{id}', [UserController::class, 'getUsers']);
Route::get('/getUser/{user}/editUser', [UserController::class, 'editUser'])->name('editUser');
Route::put('/getUser/{user}/updateUser', [UserController::class, 'updateUser'])->name('updateUser');
Route::delete('/getUser/{user}/deleteUser', [UserController::class, 'deleteUser'])->name('deleteUser');

Route::controller(ShopsController::class)->group(function () {
    Route::get('/createsShop', 'registerShop')->name('registerShop');
    Route::post('/createShop', 'createShop')->name('createShop');
});
