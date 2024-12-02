<?php

namespace App\Http\Controllers\Order\Routes;

use App\Http\Controllers\Order\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('/orders')->group(function () {
    // routes
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');

    // Fetch orders by the authenticated user
    Route::get('/user', [OrderController::class, 'getOrdersByUser'])->name('orders.user');

    // Create a new order
    Route::post('/', [OrderController::class, 'store'])->name('orders.store');

    // Fetch a specific order by ID
    Route::get('/{order}', [OrderController::class, 'show'])->name('orders.show');

    // Update a specific order by ID
    Route::put('/{order}', [OrderController::class, 'update'])->name('orders.update');

    // Delete a specific order by ID
    Route::delete('/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
});
