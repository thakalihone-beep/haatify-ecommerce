<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;

class ProductImageUrlTest extends TestCase
{
    public function test_it_builds_a_public_url_for_the_first_product_image(): void
    {
        $product = new Product([
            'images' => ['products/sample-product.jpg'],
        ]);

        $this->assertSame(
            url('storage/products/sample-product.jpg'),
            $product->first_image_url
        );
    }
}
