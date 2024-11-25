<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
        'quantity',
        'per_piece_price',
        'cart_total'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_products');
    }


}
