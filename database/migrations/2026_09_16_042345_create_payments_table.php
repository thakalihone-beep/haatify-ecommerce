<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Order being paid
            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            // Payment method
            $table->enum('payment_method', [
                'cod',
                'esewa',
                'khalti',
                'bank_transfer',
            ]);

            // Payment gateway transaction/reference ID
            $table->string('transaction_id')
                ->nullable()
                ->unique();

            // Amount paid
            $table->decimal('amount', 12, 2);

            // Payment status
            $table->enum('status', [
                'pending',
                'processing',
                'completed',
                'failed',
                'refunded',
            ])->default('pending');

            // Gateway response/reference information
            $table->text('payment_details')->nullable();

            // When payment was completed
            $table->timestamp('paid_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
