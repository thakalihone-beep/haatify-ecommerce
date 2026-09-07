<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
        protected $fillable = [
        'vendor_id',
        'category_id',
        'name',
        'slug',
        'description',
        'images',
        'tags',
        'price',
        'discount_price',
        'stock_qty',
        'status',
        'avg_rating',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
            'tags' => 'array',
            'price' => 'decimal:2',
            'discount_price' => 'decimal:2',
            'stock_qty' => 'integer',
            'avg_rating' => 'decimal:2',
        ];
    }

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function variations(): HasMany
    {
        return $this->hasMany(ProductVariation::class);
    }
}
