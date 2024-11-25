<?php

namespace App\Http\Controllers\Cart\Routes;

use App\Http\Controllers\Cart\CartController;
use Illuminate\Support\Facades\Route;


Route::prefix('cart')->group(function () {
    Route::post('/add', [CartController::class, 'addToCart']);
    Route::delete('/remove/{productId}', [CartController::class, 'removeFromCart']);
    Route::get('/view', [CartController::class, 'viewCart']);
    Route::delete('/clear', [CartController::class, 'clearCart']);
});
