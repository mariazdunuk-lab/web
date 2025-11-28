<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;


/* Публічні сторінки */
Route::get('/', function () {
    return view('home');
})->name('home');

// Каталог товарів
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Сторінка одного товару
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('products.show')
    ->whereNumber('product');

/* Аутентифікація */
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/* Адмінські маршрути */
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::resource('products', ProductController::class)->except(['index', 'show']);

    Route::resource('categories', CategoryController::class);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    // CRUD
    Route::resource('products', ProductController::class)->except(['index', 'show']);
    Route::resource('categories', CategoryController::class);
});
