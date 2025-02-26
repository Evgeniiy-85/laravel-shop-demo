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
            $table->id('order_id');
            $table->string('client_email', 128);
            $table->string('client_name', 128);
            $table->string('client_surname', 128);
            $table->string('client_patronymic', 128);
            $table->string('client_phone', 32);
            $table->text('order_params')->nullable();
            $table->integer('order_sum');
            $table->tinyInteger('order_status')->default(0);
            $table->timestamp('order_date');
            $table->timestamp('payment_date')->nullable();
            $table->integer('payment_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('orders');
    }
};
