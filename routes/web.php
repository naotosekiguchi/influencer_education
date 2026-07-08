<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function() {
        Route::get('/login', [AdminLoginController::class, 'create'])->name('login');
        Route::post('/login', [AdminLoginController::class, 'store']);

        Route::get('/register', function () {
            return view('admin.register');
        })->name('register');

        Route::post('/register', [AdminRegisterController::class, 'store'])
        ->name('register.store');
    });

    Route::middleware('auth:admin')->group(function() {
        Route::get('/top', function() {
            return view('/admin/top');
        })->name('top');

        Route::get('/banner', function() {
            return view('admin.banner.index');
        })->name('banner.index');
    });

    Route::post('/logout', [AdminLoginController::class, 'destroy'])
    ->name('logout');
});
