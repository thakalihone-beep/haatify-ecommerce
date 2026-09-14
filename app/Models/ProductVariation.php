<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductVariation extends Model
{
    protected $table = 'product_vaiations';

     protected $fillable = [
        'product_id',
        'sku',
        'attributes',
        'price',
        'discount_price',
        'stock_qty',
        'image',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'attributes' => 'array',
            'price' => 'decimal:2',
            'discount_price' => 'decimal:2',
            'stock_qty' => 'integer',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
