<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function (){
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ユーザー画面
Route::prefix('user')->namespace('User')->name('user.')->group(function () {
    //進捗画面表示
    Route::get('/progress', [App\Http\Controllers\User\ProgressController::class, 'showProgress'])->name('show.progress');

    //お知らせ画面表示
    Route::get('/article/{id}', [App\Http\Controllers\User\ArticleController::class, 'showArticle'])->name('show.article');

    //プロフィール設定画面表示
    Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'showProfileForm'])->name('show.profile');

    //プロフィール設定機能
    Route::post('/profileedit{id}', [App\Http\Controllers\User\ProfileController::class, 'submitProfileEdit'])->name('submit.profile.edit');

    //パスワード変更画面表示
    Route::get('/password', [App\Http\Controllers\User\ProfileController::class, 'showPasswordFrom'])->name('show.password.edit');

    //パスワード変更機能
    Route::post('/passwordedit{id}', [App\Http\Controllers\User\ProfileController::class, 'submitPasswordEdit'])->name('submit.password.edit');

    //トップページ画面表示
    Route::get('/top', [App\Http\Controllers\User\TopController::class, 'showTop'])->name('show.top');
    
});

//管理者画面
Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {
    //お知らせ一覧画面表示
    Route::get('/article_list', [App\Http\Controllers\Admin\ArticleController::class, 'showArticleList'])->name('show.article.list');
    //お知らせ削除機能
    Route::delete('/article_list{id}',[App\Http\Controllers\Admin\ArticleController::class, 'deleteArticle'])->name('delete.article');
    //お知らせ変更画面表示
    Route::get('/article_edit/{id}',[App\Http\Controllers\Admin\ArticleController::class, 'showArticleEdit'])->name('show.article.edit');
    //お知らせ変更機能
    Route::post('/articleedit{id}', [App\Http\Controllers\Admin\ArticleController::class,  'submitArticleEdit'])->name('submit.article.edit');
    //トップページ画面表示
    Route::get('/top', [App\Http\Controllers\Admin\TopController::class,  'showTop'])->name('show.top');
    //お知らせ新規登録画面表示
    Route::get('/article_create', [App\Http\Controllers\Admin\ArticleController::class,  'showArticleCreate'])->name('show.article.create');

});