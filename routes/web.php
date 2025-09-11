<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\GaleryController as AdminGaleryController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\TagController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/galery', [GaleryController::class, 'index'])->name('galery.index');
Route::get('/list-post', [PostController::class, 'index'])->name('post.list');
Route::get('/search', [PostController::class, 'search'])->name('posts.search');
Route::get('/list-post/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/promosi', [PromosiController::class, 'index'])->name('promosi.index');

// Authentication Routes
Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::post('/login', function() {
    $credentials = request()->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    
    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        return redirect()->intended('/admin');
    }
    
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
})->name('login.post');

Route::post('/logout', function() {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Sitemap routes
Route::get('/sitemap.xml', function () {
    if (file_exists(public_path('sitemap.xml'))) {
        return response()->file(public_path('sitemap.xml'));
    }
    return response('Sitemap not found', 404);
})->name('sitemap');

// Admin Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Posts Management
    Route::resource('posts', AdminPostController::class);
    
    // Gallery Management
    Route::resource('galeries', AdminGaleryController::class);
    
    // Logo Management
    Route::resource('logos', LogoController::class);
    
    // Tags Management
    Route::resource('tags', TagController::class);
});
