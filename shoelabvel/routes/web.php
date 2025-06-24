<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;

Route::get('/', [IndexController::class, 'index'])->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/terms', function () { return view('terms'); })->name('terms');
Route::get('/privacy', function () { return view('privacy'); })->name('privacy');
Route::get('/faq', function () { return view('faq'); })->name('faq');
Route::get('/blog', function () { return view('blog'); })->name('blog');

// Authentication routes using AuthController
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Order and cart routes
Route::get('/orderpage', [OrderController::class, 'showForm'])->name('orderpage');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

// Search route
Route::get('/search', [ProductController::class, 'search'])->name('search');

// Privacy route (also defined above, but no harm)
Route::view('/privacy', 'privacy')->name('privacy');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');

