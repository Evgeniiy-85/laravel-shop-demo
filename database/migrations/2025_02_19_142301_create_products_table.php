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
            $table->id('prod_id');
            $table->string('prod_title', 128);
            $table->string('prod_alias', 128)->unique();
            $table->text('prod_images')->nullable();
            $table->integer('prod_category')->default(0);
            $table->integer('prod_price');
            $table->integer('prod_quantity');
            $table->string('prod_short_desc', 256)->nullable();
            $table->text('prod_desc')->nullable();
            $table->boolean('prod_status')->default(1);
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
