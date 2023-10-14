<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\{HomeController, CollectionController, WishlistController, CartController, CheckoutController, OrderController, PageController, ProfileController, SearchController};


Route::get('/', [HomeController::class, 'index']);

Route::get('/collections', [CollectionController::class, 'index']);
Route::get('/collections/{slug}', [CollectionController::class, 'products']);
Route::get('/collections/{slug}/{productSlug}', [CollectionController::class, 'viewProduct']);
Route::get('/new-arrivals', [PageController::class, 'newArrivals']);
Route::get('/search', [SearchController::class, 'index']);

Route::group([
    'middleware' => 'auth'
], function(){
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::get('/cart', [CartController::class, 'index']);
    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::get('/online-payment/{order_id}', [CheckoutController::class, 'payment'])->name('online-pay');
    Route::get('/order-success', [CheckoutController::class, 'orderSuccess']);
    Route::get('/order-fail', [CheckoutController::class, 'orderFail']);
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{tracking}', [OrderController::class, 'show']);
    Route::resource('/profile', ProfileController::class)->only('index', 'store');

    Route::view('/invoice', 'site.orders.invoice');
});