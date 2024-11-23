<?php

namespace App\Http\Controllers\Cart\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'product_ids' => 'required|array',
            'quantity' => 'required|integer|min:1',
        ];
    }
}
