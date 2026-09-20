<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Wishlist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WishlistTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_add_product_to_wishlist(): void
    {
        $user = User::factory()->create();
        $category = Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'status' => 'active',
        ]);
        $vendor = Vendor::create([
            'name' => 'Demo Vendor',
            'slug' => 'demo-vendor',
            'shop_name' => 'Demo Shop',
            'email' => 'vendor@example.com',
            'phone' => '9800000000',
            'username' => 'demo_vendor',
            'password' => 'secret123',
            'pan_no' => '123456789',
            'address' => 'Kathmandu',
            'status' => 'active',
        ]);
        $product = Product::create([
            'vendor_id' => $vendor->id,
            'category_id' => $category->id,
            'name' => 'Smartphone X',
            'slug' => 'smartphone-x',
            'description' => 'A smartphone',
            'images' => ['products/phone.jpg'],
            'tags' => ['phone'],
            'price' => 19999.00,
            'discount_price' => 17999.00,
            'stock_qty' => 20,
            'status' => 'active',
            'avg_rating' => 4.5,
        ]);

        $response = $this->actingAs($user)->post(route('wishlist.store', $product->id));

        $response->assertSessionHas('success', 'Product added to wishlist.');
        $this->assertDatabaseHas('wishlists', [
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);
    }

    public function test_wishlist_page_lists_the_users_items(): void
    {
        $user = User::factory()->create();
        $category = Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'status' => 'active',
        ]);
        $vendor = Vendor::create([
            'name' => 'Demo Vendor',
            'slug' => 'demo-vendor',
            'shop_name' => 'Demo Shop',
            'email' => 'vendor2@example.com',
            'phone' => '9800000001',
            'username' => 'demo_vendor_2',
            'password' => 'secret123',
            'pan_no' => '1234567890',
            'address' => 'Pokhara',
            'status' => 'active',
        ]);
        $product = Product::create([
            'vendor_id' => $vendor->id,
            'category_id' => $category->id,
            'name' => 'Wireless Earbuds',
            'slug' => 'wireless-earbuds',
            'description' => 'Wireless earbuds',
            'images' => ['products/earbuds.jpg'],
            'tags' => ['audio'],
            'price' => 4999.00,
            'stock_qty' => 10,
            'status' => 'active',
            'avg_rating' => 4.8,
        ]);

        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        $response = $this->actingAs($user)->get(route('wishlist.index'));

        $response->assertOk();
        $response->assertSee('Wireless Earbuds');
    }

    public function test_wishlist_buttons_render_as_submit_buttons(): void
    {
        $category = Category::create([
            'name' => 'Electronics',
            'slug' => 'electronics',
            'status' => 'active',
        ]);
        $vendor = Vendor::create([
            'name' => 'Demo Vendor',
            'slug' => 'demo-vendor',
            'shop_name' => 'Demo Shop',
            'email' => 'vendor3@example.com',
            'phone' => '9800000002',
            'username' => 'demo_vendor_3',
            'password' => 'secret123',
            'pan_no' => '1234567891',
            'address' => 'Lalitpur',
            'status' => 'active',
        ]);
        $product = Product::create([
            'vendor_id' => $vendor->id,
            'category_id' => $category->id,
            'name' => 'Gaming Laptop',
            'slug' => 'gaming-laptop',
            'description' => 'Gaming laptop',
            'images' => ['products/laptop.jpg'],
            'tags' => ['laptop'],
            'price' => 149999.00,
            'stock_qty' => 4,
            'status' => 'active',
            'avg_rating' => 4.7,
        ]);

        $html = view('components.product-card', ['product' => $product])->render();

        $this->assertStringContainsString('type="submit"', $html);
    }
}
