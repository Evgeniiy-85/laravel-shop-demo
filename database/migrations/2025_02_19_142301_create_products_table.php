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
            $table->id();
            $table->string('title', 128);
            $table->string('alias', 128)->unique();
            $table->text('images')->nullable();
            $table->integer('category_id')->default(0);
            $table->integer('price');
            $table->integer('quantity');
            $table->string('short_desc', 256)->nullable();
            $table->text('desc')->nullable();
            $table->boolean('status')->default(1);
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
