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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_email')->unique();
            $table->string('user_name');
            $table->string('user_surname')->nullable();
            $table->string('user_patronymic')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_photo')->nullable();
            $table->string('user_auth_key')->nullable();
            $table->string('user_password');
            $table->tinyInteger('user_status')->default(0);
            $table->tinyInteger('user_role')->default(1);
            $table->tinyInteger('user_sex')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('user_last_visit_date')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
