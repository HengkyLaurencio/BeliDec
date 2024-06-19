<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticationController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
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
    Route::get('/shop/create', 'registerShop')->name('registerShop');
    Route::post('/shop/create', 'createShop')->name('createShop');
    Route::get('/shop/{id}', 'getShops')->name('getShops');
    Route::get('/shop/{id}/edit', 'editShop')->name('editShop');
    Route::put('/shop/{id}/edit', 'updateShop')->name('updateShop');
    Route::get('/shop/{id}/delete','deleteShop')->name('deleteShop');
    Route::delete('/shop/{id}/delete','removeShop')->name('removeShop');
});

Route::get('/Product', [ProductController::class, 'getProduct'])->name('getProduct');
Route::get('/Product/{id}',  [ProductController::class, 'getProducts'])->name('getProducts');
Route::get('/CreateProduct',  [ProductController::class, 'createProduct'])->name('createProduct');
Route::post('/Simpan',  [ProductController::class, 'simpan'])->name('simpan');
Route::get('/editProduct/{product}',  [ProductController::class, 'editProduct'])->name('editProduct');
Route::put('/updateProduct/{product}', [ProductController::class, 'updateProduct'])->name('updateProduct');
Route::delete('/deleteProduct/{product}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

//cart route
Route::controller(CartController::class)->group(function () {
    Route::get('/cart','getCart')->name('getCart');
    Route::get('/cart/{cart_id}','getCartItems')->name('getCartItems');
    Route::post('/cart/{cart_id}','putItem')->name('putItem');
    Route::delete('/cart/{cart_id}','deleteItem')->name('deleteItem');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/order','getOrder')->name('getOrder');
    Route::get('/order/{order_id}', 'getOrders')->name('getOrders');
    Route::post('/order/create/{order_id}','createOrder')->name('createOrder');
    Route::get('/order/{id}/edit', 'editOrder')->name('editOrder');
    Route::put('/order/{id}/update', 'updateOrder')->name('updateShop');
    Route::delete('/order/{order_id}','deleteOrder')->name('deleteOrder');
});