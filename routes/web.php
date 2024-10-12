<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts')->middleware('auth');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
Route::get('/posts/edit/{post}', [PostController::class, 'startEdit'])->name('posts.startEdit')->middleware('auth');
Route::patch('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes')->middleware('auth');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes')->middleware('auth');
