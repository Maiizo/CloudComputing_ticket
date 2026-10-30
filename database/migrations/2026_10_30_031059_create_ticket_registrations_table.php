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
        Schema::create('ticket_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('booking_reference')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('once_id');
            $table->string('ticket_tier');
            $table->string('tier_label');
            $table->integer('quantity');
            $table->decimal('total_price', 15, 2);
            $table->string('currency')->default('IDR');
            $table->string('gate');
            $table->string('section');
            $table->string('seats');
            $table->string('payment_method');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket_registrations');
    }
};
