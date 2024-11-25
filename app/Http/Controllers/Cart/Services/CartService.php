<?php

namespace App\Http\Controllers\Cart\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Product;

class CartService
{
    public function addToCart(array $productIds, int $quantity): Cart
    {
        $cart = Cart::create([
            'quantity' => $quantity,
        ]);

        foreach( $productIds as $productId )
        {
            $product = Product::findOrFail($productId);
            $cart->products()->attach($productId);
            $cart->per_piece_price = $product->selling_price;
        }
        $cart->per_piece_price = $product->selling_price;
        $cart->cart_total = $cart->per_piece_price * $quantity;

        $cart->save();

        return $cart;
    }

    public function removeFromCart(int $cartId, int $productId): bool
    {
        // Find the cart by its ID
        $cart = Cart::findOrFail($cartId);
        $product = Product::findOrFail($productId);

        // Detach the product from the cart
        $cart->products()->detach($productId);

        $cart->cart_total -= $product->per_piece_price;

        $cart->save();

        return true;
    }

    public function getCartItems()
    {
        return Cart::with('product')->get();
    }

    public function clearCart(): bool
    {
        return Cart::truncate();
    }
}
