<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('products', [ProductController::class, 'list']);
Route::get('products/create', [ProductController::class, 'create']);
Route::post('products', [ProductController::class, 'store'])->name('products.store');
