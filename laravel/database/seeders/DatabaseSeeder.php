<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Add this line

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (!DB::table('users')->where('email', 'test@example.com')->exists()) {
            DB::table('users')->insert([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => bcrypt('password'), // Make sure to add a password
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
