<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [UserController::class, 'index'])->name('index');



Route::get('/post-list', [PostController::class, 'getPosts'])->name('post.list');

Route::get('/post', [PostController::class, 'postIndex'])->name('post');

Route::post('/store-post', [PostController::class, 'storePost'])->name('post.store');

Route::get('/register', [AuthenticatedSessionController::class, 'registerIndex'])->name('register');

Route::post('/user-register', [AuthenticatedSessionController::class, 'register'])->name('user.register');

Route::get('/login', [AuthenticatedSessionController::class, 'loginIndex'])->name('login');

Route::post('/user-login', [AuthenticatedSessionController::class, 'login'])->name('user.login');

Route::get('/logout', [AuthenticatedSessionController::class, 'logout'])->name('logout');
