<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::redirect('', 'products');
    Route::get('report', [ReportController::class, 'report'])->name('report');

    Route::prefix('products')->group(function () {
        Route::get('', [ProductController::class, 'list'])->name('products.list');
        Route::get('create', [ProductController::class, 'create'])->name('products.create');
        Route::post('', [ProductController::class, 'store'])->name('products.store');
        Route::get('{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('{id}', [ProductController::class, 'update'])->name('products.update');
        Route::get('{id}/delete', [ProductController::class, 'delete'])->name('products.delete');
        Route::delete('{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
    
    Route::prefix('stock')->group(function () {
        Route::get('add', [StockController::class, 'addForm'])->name('stock.add.form');
        Route::post('', [StockController::class, 'add'])->name('stock.add');

        Route::get('remove', [StockController::class, 'removeForm'])->name('stock.remove.form');
        Route::patch('', [StockController::class, 'remove'])->name('stock.remove');
    });
});
