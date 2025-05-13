<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/about', function () {return view('about');})->name('about');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

Route::middleware(['auth'])->controller(OrderController::class)->group(function () {
    Route::get('/profile/orders', 'userOrders')->name('profile.orders');
    Route::get('/profile/orders/{order}', 'userShow')->name('profile.orders.show');
});

Route::middleware(['auth'])->controller(ProfileController::class)->group(function () {
    Route::get('/profile', 'index')->name('profile');
    Route::get('/profile/edit', 'edit')->name('profile.edit');
    Route::post('/profile/update', 'update')->name('profile.update');
});

Route::middleware(['auth', 'admin'])->controller(ProductController::class)->group(function () {
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
    Route::delete('/products/{product}', 'destroy')->name('products.destroy');
    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/products/{product}/update', 'update')->name('products.update');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products_show');

Route::middleware(['auth', 'admin'])->controller(OrderController::class)->group(function () {
    Route::get('/orders/create', 'create')->name('orders.create');
    Route::post('/orders', 'store')->name('orders.store');
    Route::get('/orders', 'index')->name('orders.index');
    Route::get('/orders/{order}', 'show')->name('orders.show');
    Route::delete('/orders/{order}', 'destroy')->name('orders.destroy');
    Route::get('/orders/{order}/edit', 'edit')->name('orders.edit');
    Route::put('/orders/{order}/update', 'update')->name('orders.update');
});

Route::middleware(['auth', 'admin'])->controller(CategoryController::class)->group(function () {
    Route::get('/categories/create', 'create')->name('categories.create');
    Route::post('/categories', 'store')->name('categories.store');
    Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');
    Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
    Route::put('/categories/{category}/update', 'update')->name('categories.update');
});

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Route::middleware(['auth', 'admin'])->controller(UserController::class)->group(function () {
    Route::get('/users/create', 'create')->name('users.create');
    Route::post('/users', 'store')->name('users.store');
    Route::get('/users', 'index')->name('users.index');
    Route::get('/users/{user}', 'show')->name('users.show');
    Route::delete('/users/{user}', 'destroy')->name('users.destroy');
    Route::get('/users/{user}/edit', 'edit')->name('users.edit');
    Route::put('/users/{user}/update', 'update')->name('users.update');
});