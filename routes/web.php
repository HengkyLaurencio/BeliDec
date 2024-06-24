<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidateIsAdmin;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShopsController;;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticationController;

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerPost')->name('register.post');
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginPost')->name('login.post');
    Route::get('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::controller(UserController::class)->group(function() {
        Route::get('/getUser', 'getUser')->name('getUser')->middleware(ValidateIsAdmin::class);
        Route::get('/getUsers/{id}', 'getUsers');
        Route::get('/getUser/{user}/editUser', 'editUser')->name('editUser');
        Route::put('/getUser/{user}/updateUser', 'updateUser')->name('updateUser');
        Route::delete('/getUser/{user}/deleteUser', 'deleteUser')->name('deleteUser');
    });
    
    Route::controller(ProductController::class)->group(function() {
        Route::get('/Product', 'getProduct')->name('getProduct');        
        Route::get('/Product/{id}', 'getProducts')->name('getProducts');
        Route::get('/CreateProduct', 'createProduct')->name('createProduct');
        Route::post('/Simpan', 'simpan')->name('simpan');
        Route::get('/editProduct/{product}', 'editProduct')->name('editProduct');
        Route::put('/updateProduct/{product}', 'updateProduct')->name('updateProduct');
        Route::delete('/deleteProduct/{product}', 'deleteProduct')->name('deleteProduct');
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('/cart','index')->name('getCart');
        Route::get('/cart/{cart_id}','getCartItems')->name('getCartItems');
        Route::post('/cart/{cart_id}','putItem')->name('putItem');
        Route::delete('/cart/{cart_id}/{product_id}','deleteItem')->name('deleteItem');
    });
    
    Route::controller(OrderController::class)->group(function () {
        Route::get('/order','getOrder')->name('getOrder');
        Route::get('/order/{order_id}', 'getOrders')->name('getOrders');
        Route::post('/order/create/{order_id}','createOrder')->name('createOrder');
        Route::get('/order/{id}/edit', 'editOrder')->name('editOrder');
        Route::put('/order/{id}/update', 'updateOrder')->name('updateShop');
        Route::delete('/order/{order_id}','deleteOrder')->name('deleteOrder');
    });
    
    Route::controller(ReviewController::class)->group(function() {
        Route::get('/reviews', 'index') -> name('index');
        Route::get('/reviews/{order_item_id}', 'getReview') -> name('getReview');
        Route::post('/reviews/{order_item_id}', 'createReview') -> name('createReview');
        Route::delete('/reviews/{order_item_id}', 'deleteReview') -> name('deleteReview');
    });

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
});