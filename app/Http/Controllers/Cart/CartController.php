<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Cart\Services\CartService;
use App\Http\Controllers\Cart\Requests\CartRequest;


class CartController extends Controller
{
    protected $cartService;

    public function __construct( CartService $cartService )
    {
        $this->cartService = $cartService;
    }

    public function addToCart(CartRequest $request)
    {
//        dd($request->all());

        $cart = $this->cartService->addToCart(
            $request->input('product_ids'),
            $request->input('quantity')
        );

        return response()->json(['message' => 'Product added to cart', 'cart' => $cart]);
    }

    public function removeFromCart(int $productId)
    {
        $this->cartService->removeFromCart($productId);

        return response()->json(['message' => 'Product removed from cart']);
    }

    public function viewCart()
    {
        $cartItems = $this->cartService->getCartItems();

        return response()->json(['cart_items' => $cartItems]);
    }

    public function clearCart()
    {
        $this->cartService->clearCart();

        return response()->json(['message' => 'Cart cleared']);
    }
}
