<?php

namespace App\Http\Controllers\Cart\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Product;
use App\Models\User;

class CartService
{

    public function getCart($userId)
    {
        return Cart::with('items.product')
            ->where('user_id', $userId)
            ->where('status', 'active')
            ->firstOrCreate(['user_id' => $userId, 'status' => 'active']);
    }
    public function addItems($user, $items)
    {

        $cart = $this->getCart($user);

        $items = $items['items'];
        foreach ($items as $data) {

            $product = Product::findOrFail($data['product_id']);

            // checking validation
            if (!isset($data['product_id']) || !isset($data['quantity'])) {
                throw new \Exception("Invalid item data: product_id and quantity are required.");
            }
            // checking stock
//            if ($product->stock_amount < $data['quantity']) {
//                throw new \Exception("Not enough stock available for product: {$product->name}");
//            }

            $price = $product->selling_price;
            $subTotal = $price * $data['quantity'];

            $cart->items()->updateOrCreate(
                ['product_id' => $data['product_id']],
                [
                    'quantity' => $data['quantity'],
                    'sub_total' => $subTotal
                ]
            );
        }

        // Update cart total

        $cartTotal = $cart->items->sum('sub_total');
        $cart->update(['cart_total' => $cartTotal]);

        return [
            'items' => $cart->items,
            'cart_total' => $cartTotal
        ];
    }

    public function updateItem($user, $itemId, $data)
    {
        $cart = $this->getCart($user);

        $item = $cart->items()->findOrFail($itemId);
        $product = $item->product;

        // Check if enough stock is available
        if ($product->stock < $data['quantity']) {
            throw new \Exception("Not enough stock available.");
        }

        // Calculate the new subtotal for the item
        $price = $product->selling_price;
        $subTotal = $price * $data['quantity'];

        $item->update([
            'quantity' => $data['quantity'],
            'sub_total' => $subTotal
        ]);

        $cartTotal = $cart->items->sum('sub_total');
        $cart->update(['cart_total' => $cartTotal]);

        return [
            'item' => $item,
            'cart_total' => $cartTotal
        ];
    }


    public function removeItem($user, $itemId)
    {
        $cart = $this->getCart($user);
        $cart->items()->findOrFail($itemId)->delete();
    }
}
