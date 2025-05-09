<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/create', [ProductController::class, 'create'])->name('create');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products_show');
Route::post('/products', [ProductController::class,'store'])->name('store');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products_destroy');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('edit');
Route::put('/products/{product}/update', [ProductController::class, 'update'])->name('update');