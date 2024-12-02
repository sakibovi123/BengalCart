<?php

namespace App\Http\Controllers\Order\Requests;

class OrderRequest
{
    public function rules():array
    {
        return [
            'user_id' => 'required|integer|exists:users,id',
            'cart_id' => 'required|integer|exists:carts,id',
            'status' => 'required|in:pending,shipped,paid,delivered,cancelled',
            'total' => 'nullable',
            'payment_method_id' => 'required|integer|exists:payment_methods,id',
        ];
    }
}
