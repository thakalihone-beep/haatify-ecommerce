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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            $table->string('shop_name')->nullable();

            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');

            $table->string('pan_no')->unique();

            $table->text('address')->nullable();

            $table->string('logo')->nullable();
            $table->string('banner')->nullable();

            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
                'suspended',
            ])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
