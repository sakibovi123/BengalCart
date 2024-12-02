<?php

namespace App\Http\Controllers\Cart\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'quantity' => 'required'
        ];
    }
}
