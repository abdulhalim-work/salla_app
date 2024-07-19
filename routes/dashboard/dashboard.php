<?php
use App\Http\Middleware\SallaAuth;

Route::prefix('store')->name('store.')->group(fn() => require_once __DIR__ . '/store.php');
Route::prefix('admin')->name('admin.')->group(fn() => require_once __DIR__ . '/admin.php');
