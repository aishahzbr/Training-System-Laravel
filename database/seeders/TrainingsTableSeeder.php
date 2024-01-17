<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade

class TrainingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('trainings') -> insert([
            'title' => 'Laravel Basics',
            'description' => '2 days Laravel Course',
            'trainer' => 'Aishah',
        ]);

        DB::table('trainings') -> insert([
            'title' => 'Laravel Intermediate',
            'description' => '3 days Laravel Intermediate Course',
            'trainer' => 'Amir',
        ]);

        DB::table('trainings') -> insert([
            'title' => 'Laravel Advanced',
            'description' => '5 days Laravel Advanced Course',
            'trainer' => 'Aina',
        ]);
    }
}
