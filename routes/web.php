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
    Route::get('/changepassword', 'changepassword')->name('changepassword');
    Route::post('/changepassword', 'changepasswordPost')->name('changepassword.post');
    Route::get('/logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => [ValidateIsAdmin::class]], function () {
        Route::prefix('admin')->group(function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('/getUser', 'getUser')->name('getUser'); 
                Route::get('/getUser/{id}', 'getUsers')->name('getUsers');
                Route::get('/getUser/{user}/editUser', 'editUser')->name('editUser');
                Route::put('/getUser/{user}/updateUser', 'updateUser')->name('updateUser');
                Route::delete('/getUser/{user}/deleteUser', 'deleteUser')->name('deleteUser');
            });

            Route::controller(ShopsController::class)->group(function () {
                Route::get('/getShop','getShop')->name('getShop');
                Route::get('/getShop/{id}', 'getShops')->name('getShops');
                Route::get('/shop/history','getHistory')->name('getHistory');
                Route::get('/shop/{shop}/edit', 'editShop')->name('editShop');
                Route::put('/shop/{shop}/edit', 'updateShop')->name('updateShop');
                Route::delete('/shop/{shop}/delete','deleteShop')->name('deleteShop');
            });



            
            //tambahin lagi
        });
    });


    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', 'getProducts')->name('getProducts');
        Route::get('/products', 'productsUser')->name('userProducts');
        Route::get('/product/{id}', 'getProduct')->name('getProduct');
        Route::get('/createproduct', 'createProduct')->name('createProduct');
        Route::post('/newproduct', 'newProduct')->name('newProduct');
        Route::get('/editproduct/{product}', 'editProduct')->name('editProduct');
        Route::put('/updateproduct/{product}', 'updateProduct')->name('updateProduct');
        Route::delete('/deleteproduct/{product}', 'deleteProduct')->name('deleteProduct');
    });

    Route::controller(CartController::class)->group(function () {
        Route::get('/cart','getCartItems')->name('getCartItems');
        Route::post('/cart', 'putItem')->name('putItem');
        Route::delete('/cart/{cart_id}/{product_id}', 'deleteItem')->name('deleteItem');
    });

    Route::controller(OrderController::class)->group(function () {
        Route::post('/order/create', 'createOrder')->name('createOrder.post');
        Route::get('/admin/order','getOrder')->name('getOrder')->middleware(ValidateIsAdmin::class);
        Route::get('/order','viewOrder')->name('viewOrder');
        Route::get('/order/{order_id}', 'getOrders')->name('getOrders');
        Route::get('/order/{order}/edit', 'editOrder')->name('editOrder');
        Route::put('/order/{order}/update', 'updateOrder')->name('updateOrder');
        Route::delete('/order/{order}', 'deleteOrder')->name('deleteOrder');
    });

    Route::controller(ReviewController::class)->group(function () {
        Route::get('/reviews', 'index')->name('index');
        Route::get('/reviews/{order_item_id}', 'getReview')->name('getReview');
        Route::post('/reviews/{order_item_id}', 'createReview')->name('createReview');
        Route::delete('/reviews/{order_item_id}', 'deleteReview')->name('deleteReview');
    });

    Route::controller(ShopsController::class)->group(function () {
        Route::get('/shop','getShopUser')->name('getShopUser');
        Route::get('/shop/create', 'registerShop')->name('registerShop');
        Route::post('/shop/create', 'createShop')->name('createShop');
        Route::get('/shop/history','getHistory')->name('getHistory');
        Route::get('/shop/{id}', 'getShopsUser')->name('getShopsUser');
        Route::get('/shop/{shop}/edit', 'editShop')->name('editShop');
        Route::put('/shop/{shop}/edit', 'updateShop')->name('updateShop');
        Route::delete('/shop/{shop}/delete','deleteShop')->name('deleteShop');
    });
});
