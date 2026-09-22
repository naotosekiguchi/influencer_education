<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisterController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\TopController;

use App\Http\Controllers\User\CurriculumController;

Route::get('/', function () {
    return view('welcome');
});
// 管理者ルート
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function() {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'store']);

        Route::get('/register', [RegisterController::class, 'showRegisterForm'])
        ->name('register');

        Route::post('/register', [RegisterController::class, 'store'])
        ->name('register.store');
    });

    Route::middleware('auth:admin')->group(function() {

        Route::get('/top', [TopController::class, 'showTop'])
        ->name('top');

        Route::get('/banner_edit', [BannerController::class, 'showBannerEdit'])
        ->name('show.banner.edit');

        Route::post('/banner_edit', [BannerController::class, 'update'])
        ->name('banner.update');

        Route::delete('/banner_edit/{id}', [BannerController::class, 'destroy'])
        ->name('banner.destroy');
    });

    Route::post('/logout', [LoginController::class, 'destroy'])
    ->name('logout');

});

// ユーザールート
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/curriculum_list', [CurriculumController::class, 'showCurriculumList'])
        ->name('show.curriculum');

});
