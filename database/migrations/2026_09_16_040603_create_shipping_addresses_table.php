<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();

            // Owner of this address
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('full_name');
            $table->string('phone');

            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();

            $table->string('city');
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();

            $table->string('country')->default('Nepal');

            $table->boolean('is_default')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
