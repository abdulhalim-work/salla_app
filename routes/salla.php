<?php

use App\Http\Controllers\Platforms\SallaAuthController;
use Illuminate\Support\Facades\Route;

Route::controller(SallaAuthController::class)->group(function () {
    Route::prefix('store')->name('store.')->group(function () {
        Route::get('auth', 'auth')->name('auth');
        Route::get('callback', 'callback')->name('callback');
    });
});
