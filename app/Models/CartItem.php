<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\ProductVariation;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id',
        'product_variation_id',
        'quantity',
        'price',
    ];

    protected function casts(): array
    {
        return [
            'quantity' => 'integer',
            'price' => 'decimal:2',
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Cart
    |--------------------------------------------------------------------------
    */

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Product
    |--------------------------------------------------------------------------
    */

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Product Variation
    |--------------------------------------------------------------------------
    */

    public function variation(): BelongsTo
    {
        return $this->belongsTo(
            ProductVariation::class,
            'product_variation_id'
        );
    }
}
