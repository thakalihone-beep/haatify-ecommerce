<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductRatingTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_card_does_not_show_a_half_star_for_a_rating_below_half(): void
    {
        $vendor = Vendor::create([
            'name' => 'Sample Vendor',
            'slug' => 'sample-vendor',
            'shop_name' => 'Sample Shop',
            'email' => 'vendor@example.com',
            'phone' => '9800000000',
            'password' => 'secret123',
            'pan_no' => 'PAN123456',
            'address' => 'Kathmandu',
            'status' => 'approved',
        ]);

        $category = Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'status' => 'active',
        ]);

        $product = Product::create([
            'vendor_id' => $vendor->id,
            'category_id' => $category->id,
            'name' => 'Sample Product',
            'slug' => 'sample-product',
            'price' => 100.00,
            'discount_price' => null,
            'stock_qty' => 10,
            'status' => 'active',
            'avg_rating' => 3.2,
            'images' => ['https://example.com/image.jpg'],
        ]);

        $html = view('components.product-card', ['product' => $product])->render();

        $this->assertSame(0, substr_count($html, 'fa-solid fa-star-half-stroke'));
        $this->assertSame(3, substr_count($html, 'fa-solid fa-star'));
    }
}
