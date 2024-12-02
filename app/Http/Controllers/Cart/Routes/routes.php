<?php

namespace App\Http\Controllers\Cart\Routes;

use App\Http\Controllers\Cart\CartController;
use Illuminate\Support\Facades\Route;


Route::prefix('cart')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add-to-cart', [CartController::class, 'store'])->name('cart.store');
    Route::put('/update-cart/{itemId}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/delete-cart/{itemId}', [CartController::class, 'destroy'])->name('cart.delete');
});
