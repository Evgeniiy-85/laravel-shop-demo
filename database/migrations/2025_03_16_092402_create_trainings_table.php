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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('alias', 128);
            $table->string('short_desc')->nullable();
            $table->text('desc')->nullable();
            $table->boolean('status');
            $table->boolean('is_paid')->default(0);
            $table->tinyInteger('sort');
            $table->tinyInteger('access_type');
            $table->text('params')->nullable();
            $table->string('seo_title', 128)->nullable();
            $table->string('meta_desc', 256)->nullable();
            $table->string('meta_keys', 256)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
