<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            [
                'category' => 'SUV',
                'brand' => 'Toyota',
                'model' => 'RAV4',
                'image_url' => 'public\storage\assets\cars\luxury\audi.png',
                'price' => 35000,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Sedan',
                'brand' => 'Honda',
                'model' => 'Civic',
                'image_url' => 'public\storage\assets\cars\luxury\R.png',
                'price' => 25000,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category' => 'Truck',
                'brand' => 'Ford',
                'model' => 'F-150',
                'image_url' => 'public\storage\assets\cars\family\avanza.png',
                'price' => 45000,
                'status' => 'out_of_stock',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
