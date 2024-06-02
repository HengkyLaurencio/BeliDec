<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getProduct', [ProductController::class, 'getProduct'])->name('getProduct');
