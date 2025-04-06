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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id');
            $table->string('title', 256);
            $table->string('alias', 256)->unique();
            $table->string('image')->nullable();
            $table->integer('parent')->default(0);
            $table->boolean('status')->default(1);
            $table->string('seo_title', 128)->nullable();
            $table->string('meta_desc', 256)->nullable();
            $table->string('meta_keys', 256)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
