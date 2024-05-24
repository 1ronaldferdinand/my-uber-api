<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PigeonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example data
        $data = [
            [
                'name' => 'Antonio',
                'speed' => 70,
                'range' => 600,
                'cost' => 2,
                'downtime' => 2,
                'maximum_weight' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bonito',
                'speed' => 80,
                'range' => 500,
                'cost' => 2,
                'downtime' => 3,
                'maximum_weight' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carillo',
                'speed' => 65,
                'range' => 1000,
                'cost' => 2,
                'downtime' => 3,
                'maximum_weight' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alejandro',
                'speed' => 70,
                'range' => 800,
                'cost' => 2,
                'downtime' => 2,
                'maximum_weight' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert data into the migrations table
        DB::table('pigeons')->insert($data);
    }
}
