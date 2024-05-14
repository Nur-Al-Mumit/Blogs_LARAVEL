<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index'])->name('index');

Route::group(["middleware" => ["auth"]], function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('/post-view{id}',  'viewPost')->name('post.view');
        Route::get('/post',  'postIndex')->name('post');
        Route::post('/store-post',  'storePost')->name('post.store');
        Route::get('/edit-post/{id}',  'editPost')->name('edit.post');
        Route::post('/post-update',  'updatePost')->name('post.update');
        Route::get('/post-delete/{id}',  'deletePost')->name('post.delete');
    });
});

Route::controller(AuthenticatedSessionController::class)->group(function () {
    Route::get('/register', 'registerIndex')->name('register');
    Route::post('/user-register', 'register')->name('user.register');
    Route::get('/login', 'loginIndex')->name('login');
    Route::post('/user-login', 'login')->name('user.login');
    Route::get('/logout', 'logout')->name('logout');
});
