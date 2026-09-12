<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function getFirstImageUrlAttribute(): ?string
    {
        $images = $this->images;

        if (is_string($images)) {
            $decoded = json_decode($images, true);
            $images = is_array($decoded) ? $decoded : [$images];
        }

        if (! is_array($images) || empty($images[0])) {
            return null;
        }

        $firstImage = (string) $images[0];

        if ($firstImage === '') {
            return null;
        }

        if (str_starts_with($firstImage, 'http://') || str_starts_with($firstImage, 'https://')) {
            return $firstImage;
        }

        $path = ltrim($firstImage, '/');

        if ($path === '') {
            return null;
        }

        // The path may already include the "storage/" prefix depending on
        // how it was stored, so normalise it before building the URL.
        if (str_starts_with($path, 'storage/')) {
            $path = substr($path, strlen('storage/'));
        }

        // Build a request-aware URL (respects the current host/port) instead
        // of the APP_URL-bound Storage::url(), which breaks when the app is
        // served on a different host/port than APP_URL.
        return asset('storage/' . $path);
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
        return $this->hasMany(ProductVaiation::class);
    }
}
