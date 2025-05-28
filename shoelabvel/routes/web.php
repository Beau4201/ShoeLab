<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('index');
})->name('home');

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

route::get('/contact', function () {
    return view('contact');
})->name('contact');

route::get('/about', function () {
    return view('about');
})->name('about');

route::get('/terms', function () {
    return view('terms');
})->name('terms');

route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

route::get('/faq', function () {
    return view('faq');
})->name('faq');

route::get('/blog', function () {
    return view('blog');
})->name('blog');

route::get("login", function () {
    return view('login');
})->name('login');

route::get("register", function () {
    return view('register');
})->name('register');



// Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/search', [ProductController::class, 'search'])->name('search');
