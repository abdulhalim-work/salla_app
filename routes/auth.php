<?php
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;

Route::prefix('register')->controller(RegisterController::class)->group(function () {
    Route::get('/', 'create')->name('register');
    Route::post('/', 'store')->name('register.store');
});


Route::prefix('session')->controller(SessionController::class)->group(function () {
    Route::get('/', 'create')->name('login');
    Route::post('/', 'store')->name('session.store');
    Route::delete('/', 'logout')->name('logout');
});

