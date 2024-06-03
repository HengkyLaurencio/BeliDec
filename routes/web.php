<?php


use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/Product', [ProductController::class, 'getProduct'])->name('getProduct');
Route::get('/Product/{id}',  [ProductController::class, 'getProducts'])->name('getProducts');

Route::get('/CreateProduct',  [ProductController::class, 'createProduct'])->name('createProduct');
Route::post('/Simpan',  [ProductController::class, 'simpan'])->name('simpan');

Route::get('/editProduct/{product}',  [ProductController::class, 'editProduct'])->name('editProduct');
Route::put('/updateProduct/{product}', [ProductController::class, 'updateProduct'])->name('updateProduct');

Route::delete('/deleteProduct/{product}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');