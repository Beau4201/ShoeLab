<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;


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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // Formulier aanmaken product
Route::post('/products', [ProductController::class, 'store'])->name('products.store'); // Product opslaan
Route::get('/orderpage', [OrderController::class, 'showForm'])->name('orderpage'); // Route voor bestelpagina


// Optioneel: zoekfunctie
Route::get('/search', [ProductController::class, 'search'])->name('search');
// Route::get('/products', [ProductController::class, 'index'])->name('products');
// Route::get('/products', [ProductController::class, 'showProducts'])->name('products');






