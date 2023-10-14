<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{DashboardController, CategoryController, BrandController, ColorController, OrderController, ProductController, SettingController, sliderController, UserController};

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth:admin'
], function () { 

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('categories', CategoryController::class)->except(['show', 'destroy']);

    Route::resource('brands', BrandController::class)->only('index');

    Route::resource('products', ProductController::class);
    Route::post('updateProductColor', [ProductController::class, 'updateProductColor']);

    Route::resource('colors', ColorController::class);

    Route::resource('sliders', sliderController::class);

    Route::resource('orders', OrderController::class);

    Route::resource('settings', SettingController::class)->only('index', 'store');

    Route::resource('users', UserController::class);
    
});