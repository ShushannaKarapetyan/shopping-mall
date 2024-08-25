<?php
declare(strict_types=1);

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/products', [ProductsController::class, 'getProducts']);
Route::get('/products/{id}', [ProductsController::class, 'find']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products', [ProductsController::class, 'create']);
    Route::put('/products/{id}', [ProductsController::class, 'update']);
    Route::delete('/products/{id}', [ProductsController::class, 'delete']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
