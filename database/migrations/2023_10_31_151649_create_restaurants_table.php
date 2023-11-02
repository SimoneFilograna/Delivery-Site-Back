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
        Schema::create('restaurants', function (Blueprint $table) {
            
            // create restaurants table with mysql data types
            $table->id();
            $table->string("restaurant_name", 100);
            $table->string("restaurant_address", 255);
            $table->text("restaurant_image");
            $table->string("restaurant_phone", 30);
            $table->string("vat_number", 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};
