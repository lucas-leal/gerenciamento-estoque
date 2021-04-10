<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('products', [ProductController::class, 'list'])->name('products.list');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('products/{id}/delete', [ProductController::class, 'delete'])->name('products.delete');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('stock/add', [StockController::class, 'addForm'])->name('stock.add.form');
Route::post('stock', [StockController::class, 'add'])->name('stock.add');

Route::get('stock/remove', [StockController::class, 'removeForm'])->name('stock.remove.form');
Route::patch('stock', [StockController::class, 'remove'])->name('stock.remove');
