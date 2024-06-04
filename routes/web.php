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
    Route::get('/shop','getShop')->name('getShop');
    Route::get('/shop/{id}', 'getShops')->name('getShops');
    Route::get('/shop/create', 'registerShop')->name('registerShop');
    Route::post('/shop/create', 'createShop')->name('createShop');
    Route::get('/shop/{id}/edit', 'editShop')->name('editShop');
    Route::put('/shop/{id}/edit', 'updateShop')->name('updateShop');
    Route::get('/shop/{id}/delete','deleteShop')->name('deleteShop');
    Route::delete('/shop/{id}/delete','removeShop')->name('removeShop');
});
