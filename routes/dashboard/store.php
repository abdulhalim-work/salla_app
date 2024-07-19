<?php

use App\Http\Controllers\Dashboard\Store\ProductsController;
use App\Http\Controllers\Dashboard\Store\SallaAuthController;
use App\Http\Controllers\Dashboard\Store\SettingsController;
use Illuminate\Support\Facades\Route;

// Route::controller(SallaAuthController::class)->prefix('salla')->name('salla.')->group(function () {
//     Route::prefix('store')->name('store.')->group(function () {
//         Route::get('auth', 'auth')->name('auth');
//         Route::get('callback', 'callback')->name('callback');
//     });
// });

Route::view('/', 'dashboard.store.index')->name('index');

Route::resource('products', ProductsController::class)
    ->only(['index', 'update'])
    ->middleware('salla_auth');
Route::resource('settings', SettingsController::class)
    ->only(['index', 'update'])
    ->middleware('salla_auth');
