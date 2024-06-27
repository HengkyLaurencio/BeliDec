<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidateIsAdmin;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShopsController;;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Middleware\createShop;
use App\Http\Middleware\haveShop;

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
                Route::get('/users', 'getUser')->name('getUser'); 
                Route::get('/getUser/{id}', 'getUsers')->name('getUsers');
                Route::get('/user/{user}/edit', 'editUser')->name('editUser');
                Route::put('/getUser/{user}/updateUser', 'updateUser')->name('updateUser');
                Route::delete('/getUser/{user}/deleteUser', 'deleteUser')->name('deleteUser');
            });

            Route::controller(OrderController::class)->group(function () {
                Route::get('/order','getOrder')->name('getOrder');
                Route::get('/order/{order_id}', 'orderDetailAdmin')->name('getOrderDetailAdmin');
                Route::get('/order/{order}/edit', 'editOrder')->name('editOrder');
                Route::put('/order/{order}/update', 'updateOrder')->name('updateOrder');
                Route::delete('/order/{order}', 'deleteOrder')->name('deleteOrder');
            });

            //tambahin lagi
            Route::controller(ProductController::class)->group(function () {
                Route::get('/products', 'getProducts')->name('getProducts');
                Route::get('/product/{product}/edit', 'adminEditProduct')->name('adminEditProduct');
            });

            Route::controller(ShopsController::class)->group(function () {
                Route::get('/shops','getShop')->name('getShop');
                Route::get('/shop/{shop}/edit', 'adminEditShop')->name('adminEditShop');
            });
        });
    });

    Route::get('/update-balance', [UserController::class, 'viewUpdateBalance'])->name('updateBalance');
    Route::post('/update-balance', [UserController::class, 'updateBalance'])->name('balance.update');
    Route::post('/add-balance', [UserController::class, 'payBalance'])->name('balance.add');

    Route::get('/home', function () {
        return redirect()->route('userProducts');
    })->name('home');

    Route::controller(ProductController::class)->group(function () {
        // Route::get('/product', 'getProducts')->name('getProducts');
        Route::get('/', 'productsUser')->name('userProducts');
        Route::get('/product/{id}', 'getProduct')->name('detailProduct');

        // Route::get('/createproduct', 'createProduct')->name('createProduct');
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
        Route::get('/order','viewOrder')->name('viewOrder');
        Route::get('/order/{order_id}', 'getOrders')->name('getOrders');
        Route::delete('/order/{order}', 'deleteOrderData')->name('deleteOrderData');
    });


    Route::controller(ReviewController::class)->group(function () {
        Route::get('/reviews', 'getReview')->name('index');
        Route::get('/reviews/{order_item_id}', 'getReviewById')->name('createReview'); // Route to display the review form
        Route::post('/reviews/{order_item_id}', 'createReview')->name('createReviews'); // Route to handle form submission
        // Route::delete('/reviews/{order_item_id}', 'deleteReview')->name('deleteReview');
    });
    

    Route::controller(ShopsController::class)->group(function () {
        Route::get('/shop/{id}', 'getShops')->name('getShops');
    });


    Route::prefix('myShop')->group(function () {
        Route::controller(ShopsController::class)->group(function () {
            
            Route::get('/create', 'registerShop')->name('registerShop')->middleware(createShop::class);
            Route::post('/create', 'createShop')->name('createShop');

            Route::put('/shop/{shop}/edit', 'updateShop')->name('updateShop');
            Route::delete('/shop/{shop}/delete','deleteShop')->name('deleteShop');
            
            Route::get('/shop/{id}', 'getShops')->name('getShops');

            Route::group(['middleware' => [haveShop::class]], function () {
                Route::get('/products', 'getProducts')->name('getProductShop');
                Route::get('/product/{product}/edit', 'updateProductShop')->name('updateProductShop');
                Route::get('/salesHistory','getHistory')->name('getSalesHistory');
                Route::get('/', 'mainDashboard')->name('shopMainDashboard');

                // Route::get('/', 'editShop')->name('editShop');

                
            });

            Route::controller(ProductController::class)->group(function () {
                Route::get('/product/create', 'createProduct')->name('createProduct');
            });
        });
    });
});

Route::get('/search', [SearchController::class, 'search'])->name('search');
