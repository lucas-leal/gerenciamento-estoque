<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'apiLogin']);

Route::middleware('auth:sanctum')->group(function () {
    Route::patch('baixar-produtos', [StockController::class, 'removeStock']);
    Route::patch('adicionar-produtos', [StockController::class, 'addStock']);
});

