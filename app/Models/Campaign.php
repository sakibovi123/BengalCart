<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //

    protected $fillable = [
        'campaign_name'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
