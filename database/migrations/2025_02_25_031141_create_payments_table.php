<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('pay_name')->unique();
            $table->string('pay_title');
            $table->text('pay_desc')->nullable();
            $table->integer('pay_sort')->default(1);
            $table->tinyInteger('pay_status')->default(0);
            $table->string('pay_image')->nullable();
            $table->string('pay_button_title')->nullable();
            $table->text('pay_params')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('payments');
    }
};
