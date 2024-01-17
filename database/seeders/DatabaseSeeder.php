<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call (TrainingsTableSeeder::class);
        // DB::table('users') -> insert([
        //     'name' => 'Ali',
        //     'email' => 'ali@gmail.com',
        //     'password' => bcrypt('abc123'),
        // ]);

        // DB::table('users') -> insert([
        //     'name' => 'Aina',
        //     'email' => 'aina@gmail.com',
        //     'password' => bcrypt('abc123'),
        // ]);

        // DB::table('users') -> insert([
        //     'name' => 'Amir',
        //     'email' => 'amir@gmail.com',
        //     'password' => bcrypt('abc123'),
        // ]);
    }
}
