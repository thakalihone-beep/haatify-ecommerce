<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();

            // Order this item belongs to
            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            // Product purchased
            $table->foreignId('product_id')
                ->constrained()
                ->restrictOnDelete();

            // Optional variation
            $table->foreignId('product_variation_id')
                ->nullable()
                ->constrained('product_vaiations')
                ->nullOnDelete();

            // Product information at the time of purchase
            $table->string('product_name');

            // Variation information at the time of purchase
            $table->string('variation_name')->nullable();

            // Quantity purchased
            $table->unsignedInteger('quantity');

            // Price of ONE item when ordered
            $table->decimal('unit_price', 12, 2);

            // Total = unit_price × quantity
            $table->decimal('total_price', 12, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
