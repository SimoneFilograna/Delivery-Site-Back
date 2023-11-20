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
        Schema::create('orders', function (Blueprint $table) {

            // create orders table with mysql data types
            $table->id();
            $table->string("customer_name", 100);
            $table->string("customer_lastname", 100);
            $table->string("customer_email", 100);
            $table->string("customer_address", 255);
            $table->string("customer_phone", 30);
            $table->decimal("amount_paid", 6,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
