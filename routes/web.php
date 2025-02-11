<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\PromosiController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/galery', [GaleryController::class, 'index'])->name('galery.index');
Route::get('/list-post', [PostController::class, 'index'])->name('post.list');
Route::get('/search', [PostController::class, 'search'])->name('posts.search');
Route::get('/list-post/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/promosi', [PromosiController::class, 'index'])->name('promosi.index');
