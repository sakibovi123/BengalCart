<?php

namespace App\Http\Controllers\Order\Services;

use App\Models\Order;
class OrderService
{

    public function getAllOrders()
    {
        return Order::orderBy('created_at', 'desc')->paginate(15);
    }

    public function orderByUser( $userId )
    {
        return Order::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(15);
    }
    public function createOrder($data)
    {
        // Handle order creation
        $order = Order::create($data);
        return $order;
    }

    public function updateOrder(string $orderId, array $data)
    {
        // Handle order update
        $order = Order::findOrFail($orderId);
        return $order->update($data);
    }

    public function deleteOrder($orderId)
    {
        // Handle order deletion
        $order = Order::findOrFail($orderId);
        return $order->delete();
    }
}
