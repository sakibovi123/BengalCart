<?php


namespace App\Http\Controllers\Product\Routes;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductController;

Route::prefix('/products')
    ->group(function () {
        // List all products
        Route::get('/', [ProductController::class, 'index'])
            ->name('products.index');

        // Get products by category
        Route::get('/category/{categoryId}', [ProductController::class, 'getByCategory'])
            ->name('products.byCategory');

        // Get products by subcategory
        Route::get('/subcategory/{subcategoryId}', [ProductController::class, 'getBySubCategory'])
            ->name('products.bySubCategory');

        // Get products by brand
        Route::get('/brand/{brandId}', [ProductController::class, 'getByBrand'])
            ->name('products.byBrand');

        // Create a new product
        Route::post('/', [ProductController::class, 'store'])
            ->name('products.store');

        // Update an existing product
        Route::put('/update/{productId}', [ProductController::class, 'update'])
            ->name('products.update');

        // Delete a product
        Route::delete('/{productId}', [ProductController::class, 'destroy'])
            ->name('products.destroy');
    });
