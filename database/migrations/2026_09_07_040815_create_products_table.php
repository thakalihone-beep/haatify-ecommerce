<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // Vendor who owns the product
            $table->foreignId('vendor_id') ->constrained('vendors') ->cascadeOnDelete();
            // Category of the product
            $table->foreignId('category_id') ->constrained('categories') ->restrictOnDelete();
            // Product information
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            // Multiple product images
            $table->json('images')->nullable();
            // Product tags
            $table->json('tags')->nullable();
            // Pricing
            $table->decimal('price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();
            // Stock
            $table->unsignedInteger('stock_qty')->default(0);
            // Product status
            $table->enum('status', [ 'draft', 'active', 'inactive', 'out_of_stock' ])->default('draft');
            // Average product rating
            $table->decimal('avg_rating', 3, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
