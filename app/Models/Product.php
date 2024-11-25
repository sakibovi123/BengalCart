<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'features',
        'specification',
        'buying_price',
        'selling_price',
        'discount',
        'main_image',
        'multi_images',
        'video_url',
        'stock_amount',
        'is_out_of_stock',
        'brand_id',
        'category_id',
        'sub_category_id'
    ];

    protected $casts = [
        'multi_images' => 'array',
        'is_out_of_stock' => 'boolean'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    // campaign
    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class, 'campaign_products');
    }

    // cart
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}
