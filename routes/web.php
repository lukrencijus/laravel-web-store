<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/about', function () {return view('about');})->name('about');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

Route::middleware(['auth'])->controller(OrderController::class)->group(function () {
    Route::post('/orders', 'store')->name('orders');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth', 'admin'])->controller(ProductController::class)->group(function () {
    Route::get('/products/create', 'create')->name('create');
    Route::post('/products', 'store')->name('store');
    Route::delete('/products/{product}', 'destroy')->name('products_destroy');
    Route::get('/products/{product}/edit', 'edit')->name('edit');
    Route::put('/products/{product}/update', 'update')->name('update');
});
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products_show');