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
        Schema::create('order_plate', function (Blueprint $table) {
            // create foreign order_id
            $table->unsignedBigInteger("order_id");
            $table->foreign("order_id")->references("id")->on("orders");

            // create foreign plate_id
            $table->unsignedBigInteger("plate_id");
            $table->foreign("plate_id")->references("id")->on("plates");

            // add quantity column
            $table->Integer("quantity");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_plate');
    }
};
