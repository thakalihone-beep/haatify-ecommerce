<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductCartFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_add_product_to_cart(): void
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

        $response = $this->actingAs($user)->post(route('cart.add', $product), [
            'quantity' => 2,
        ]);

        $response->assertRedirect(route('cart.index'));
        $this->assertDatabaseHas('cart_items', [
            'product_id' => $product->id,
            'quantity' => 2,
        ]);
    }

    public function test_user_can_buy_now_from_product_page(): void
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

        $response = $this->actingAs($user)->post(route('cart.add', $product), [
            'quantity' => 1,
            'buy_now' => true,
        ]);

        $response->assertRedirect(route('checkout.index'));
    }

    public function test_user_can_search_products_by_name(): void
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

        Product::create([
            'vendor_id' => $vendor->id,
            'category_id' => $category->id,
            'name' => 'Gaming Laptop Pro',
            'slug' => 'gaming-laptop-pro',
            'description' => 'High performance gaming laptop',
            'images' => ['products/laptop.jpg'],
            'tags' => ['laptop', 'gaming'],
            'price' => 129999.00,
            'stock_qty' => 12,
            'status' => 'active',
            'avg_rating' => 4.7,
        ]);

        Product::create([
            'vendor_id' => $vendor->id,
            'category_id' => $category->id,
            'name' => 'Office Keyboard',
            'slug' => 'office-keyboard',
            'description' => 'Mechanical keyboard for work',
            'images' => ['products/keyboard.jpg'],
            'tags' => ['keyboard'],
            'price' => 1999.00,
            'stock_qty' => 30,
            'status' => 'active',
            'avg_rating' => 4.2,
        ]);

        $response = $this->get(route('search', ['q' => 'gaming laptop']));

        $response->assertOk();
        $response->assertSee('Gaming Laptop Pro');
        $response->assertDontSee('Office Keyboard');
    }
}
