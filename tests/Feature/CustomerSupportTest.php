<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerSupportTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_support_form_can_be_submitted(): void
    {
        $response = $this->post(route('contact-support.store'), [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'subject' => 'order',
            'message' => 'I need help with my order.',
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Your support request has been submitted successfully.');

        $this->assertDatabaseHas('customer_support_tickets', [
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'subject' => 'order',
            'status' => 'open',
        ]);
    }

    public function test_customer_support_form_accepts_valid_order_number(): void
    {
        $user = User::factory()->create();

        $order = Order::create([
            'user_id' => $user->id,
            'shipping_address_id' => null,
            'order_number' => 'HAT-ABC123',
            'subtotal' => 1000.00,
            'shipping_fee' => 0,
            'discount_amount' => 0,
            'tax_amount' => 0,
            'total_amount' => 1000.00,
            'status' => 'pending',
            'payment_status' => 'pending',
        ]);

        $response = $this->post(route('contact-support.store'), [
            'name' => 'John Smith',
            'email' => 'john@example.com',
            'order_id' => 'HAT-ABC123',
            'subject' => 'delivery',
            'message' => 'My parcel has not arrived yet.',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('customer_support_tickets', [
            'name' => 'John Smith',
            'order_id' => $order->id,
            'subject' => 'delivery',
            'status' => 'open',
        ]);
    }
}
