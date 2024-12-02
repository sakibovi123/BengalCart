<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Cart\Requests\UpdateCartRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Cart\Services\CartService;
use App\Http\Controllers\Cart\Requests\StoreCartRequest;


class CartController extends Controller
{
    protected $cartService;

    public function __construct( CartService $cartService )
    {
        $this->cartService = $cartService;
    }

    public function index(): JsonResponse
    {
        $cart = $this->cartService->getCart(auth()->user());
        return response()->json($cart);
    }

    public function store(StoreCartRequest $request): JsonResponse
    {
//        dd($request->all());
        $cartItem = $this->cartService->addItems(auth()->user(), $request->validated());
        return response()->json($cartItem, 201);
    }

    public function update(UpdateCartRequest $request, $itemId): JsonResponse
    {
        $updatedItem = $this->cartService->updateItem(auth()->user(), $itemId, $request->validated());

        return response()->json($updatedItem);
    }

    public function destroy($itemId): JsonResponse
    {
        $this->cartService->removeItem(auth()->user(), $itemId);
        return response()->json(['message' => 'Item removed'], 200);
    }
}
