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
        Schema::create('plates', function (Blueprint $table) {

            // create plates table with mysql data types
            $table->id();
            $table->string("name", 100);
            $table->text("ingredients");
            $table->text("description");
            $table->decimal("price", 6,2);
            $table->text("image");
            $table->boolean("visibility");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plates');
    }
};
