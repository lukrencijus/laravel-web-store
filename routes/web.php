<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('product');

Route::get('/album', function () {
    return view('album');
})->name('album');

Route::get('/products/{id}', function ($id) {
    return view('products.show', ['id'=> $id]);
})->name('home');

