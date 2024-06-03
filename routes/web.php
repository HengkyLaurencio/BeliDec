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

// Route::put('/Product/{id}/updateProduct', [ProductController::class, 'putProduct'])->name('updateProduct');