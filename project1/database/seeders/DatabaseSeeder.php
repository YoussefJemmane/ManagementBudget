<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Centre d\'appui',
            'email' => 'yous.jemm@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Centre d\'appui',
            'email_verified_at' => now(),
            'cin' => '1234567890',
        ]);
    }
}
