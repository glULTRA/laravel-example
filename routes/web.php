<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\User\ImageUploadController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UserPostController;
use App\Http\Livewire\PostLikeCounter;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::post('/posts/{post}/likes', [PostLikeCounter::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeCounter::class, 'destroy'])->name('posts.likes');

Route::get('/users/{user:username}/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/users/{user:username}/profile', [ProfileController::class, 'store']);

Route::get('/users/{user}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::get('/images-add', [ImageUploadController::class, 'store'])->name('images.add');

Route::get('/friends', [FriendsController::class, 'index'])->name('friends');
Route::post('/friends/{user}', [FriendsController::class, 'store'])->name('friends.add');

