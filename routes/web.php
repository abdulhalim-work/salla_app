<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::prefix('auth')->prefix('auth')->group(fn() => require_once __DIR__ . '/auth.php');
Route::prefix('salla')->name('salla.')->prefix('salla')->middleware('auth')->group(fn() => require_once __DIR__ . '/salla.php');
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(fn() => require_once __DIR__ . '/dashboard/dashboard.php');
// Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
//     $files = scandir(__DIR__ . '/dashboard');
//     foreach ($files as $file) {
//         if ($file == '.' | $file == '..')
//             continue;
//         require_once __DIR__ . '/dashboard/' . $file;
//     }
// });
