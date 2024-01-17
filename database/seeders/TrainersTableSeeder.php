<?php

namespace Database\Seeders;

use App\Models\Trainer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade


class TrainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // DB::table('trainers') -> insert([
        //     'name' => 'Aishah',
        //     'email' => 'aishah@gmail.com',
        //     'mobile_number' => '0129292929',
        //     'gender' => 'female', 
        //     'status' => 'active', 
        //     'address' => '00, Jalan Merak, 009900',

        // ]);

        Trainer::factory()->count(4)->create();

    }
}
