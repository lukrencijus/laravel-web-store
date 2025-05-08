<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/products/create', [ProductController::class, 'create'])->name('create');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products_show');

Route::post('/products', [ProductController::class,'store'])->name('store');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products_destroy');