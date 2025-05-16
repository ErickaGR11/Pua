<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'ericka@gmail.com',
            'phone' => '1234567890',
            'role' => 'admin',
            'password' => bcrypt('password'), // password
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'ericka1@gmail.com',
            'phone' => '1234567890',
            'role' => 'user',
            'password' => bcrypt('password'), // password
        ]);
    }
}
