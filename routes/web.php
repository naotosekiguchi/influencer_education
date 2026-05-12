<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CurriculumController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    
    Route::get('/top', [App\Http\Controllers\Admin\TopController::class, 'showTop'])->name('show.top');
    Route::get('/curriculum_list', [App\Http\Controllers\Admin\CurriculumController::class, 'showCurriculumList'])->name('show.curriculum.list');
    Route::get('/curriculum_create', [App\Http\Controllers\Admin\CurriculumController::class, 'showCurriculumCreate'])->name('show.curriculum.create');
    Route::get('/curriculum_edit/{id}', [App\Http\Controllers\Admin\CurriculumController::class, 'showCurriculumEdit'])->name('show.curriculum.edit');
    Route::get('/delivery_edit/{id}', [App\Http\Controllers\Admin\DeliveryController::class, 'showDeliveryEdit'])->name('show.delivery.edit');

});