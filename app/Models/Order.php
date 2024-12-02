<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'cart_id',
        'user_id',
        'status',
        'total',
        'trx_id',
        'payment_method_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (is_null($model->trx_id)) {
                $model->trx_id = uniqid('trx_', true);
            }
        });
    }

    public function cart(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function payment_method(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
