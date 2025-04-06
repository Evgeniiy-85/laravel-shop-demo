<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_name' => 'admin',
            'user_email' => 'admin@example.com',
            'user_password' => Hash::make('123456'),
            'user_status' => \App\Models\User\User::STATUS_ACTIVE,
            'user_role' => \App\Models\User\User::ROLE_ADMIN,
            'created_at' => Carbon::now(),
        ]);
    }
}
