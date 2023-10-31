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
        Schema::table('plates', function (Blueprint $table) {
            // create restaurant_id column and make it foreign
            $table->unsignedBigInteger("restaurant_id")->after("visibility");

            $table->foreign("restaurant_id")
                ->references("id")
                ->on("restaurants");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plates', function (Blueprint $table) {
            // remove foreign and drop restaurant_id column
            $table->dropForeign("plates_restaurant_id_foreign");
            $table->dropColumn('restaurant_id');
        });
    }
};