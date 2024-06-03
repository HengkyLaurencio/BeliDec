<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Product', [ProductController::class, 'getProduct'])->name('getProduct');
Route::get('/Product/{id}',  [ProductController::class, 'getProducts'])->name('getProducts');

Route::get('/CreateProduct',  [ProductController::class, 'createProduct'])->name('createProduct');
Route::post('/Simpan',  [ProductController::class, 'simpan'])->name('simpan');

Route::get('/editProduct/{product}',  [ProductController::class, 'editProduct'])->name('editProduct');
Route::put('/updateProduct/{product}', [ProductController::class, 'updateProduct'])->name('updateProduct');

Route::delete('/deleteProduct/{product}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');