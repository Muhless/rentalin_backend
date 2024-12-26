<?php

namespace Database\Seeders;

use App\Models\Cars;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    public function run(): void
    {

        Cars::create([
            'category' => 'family',
            'brand' => 'Honda',
            'model' => 'Brio',
            'icon_path' => 'assets/image/icons/family/toyota.png',
            'image_path' => 'assets/image/cars/family/honda.png',
            'capacity' => 4,
            'transmission' => 'Manual',
            'price' => 150000,
            'status' => 'Available',

        ]);

        Cars::create([
            'category' => 'family',
            'brand' => 'Honda',
            'model' => 'Brio',
            'icon_path' => 'assets/image/icons/family/toyota.png',
            'image_path' => 'assets/image/cars/family/brio.png',
            'capacity' => 4,
            'transmission' => 'Automatic',
            'price' => 200000,
            'status' => 'Available',
        ]);

        Cars::create([
            'category' => 'commercial',
            'brand' => 'Mitsubishi',
            'model' => 'Pajero',
            'icon_path' => 'assets/image/icons/family/mitshubishi.png',
            'image_path' => 'assets/image/cars/family/pajero.png',
            'capacity' => 4,
            'transmission' => 'Automatic',
            'price' => 400000,
            'status' => 'Not Available',
        ]);

        Cars::create([
            'category' => 'commercial',
            'brand' => 'Toyota',
            'model' => 'Pickup',
            'icon_path' => 'assets/image/icons/family/toyota.png',
            'image_path' => 'assets/image/cars/commercial/pickup.png',
            'capacity' => 4,
            'transmission' => 'Manual',
            'price' => 320000,
            'status' => 'Available',
        ]);

        Cars::create([
            'category' => 'luxury',
            'brand' => 'Audi',
            'model' => 'A6',
            'icon_path' => 'assets/image/icons/luxury/audi.png',
            'image_path' => 'assets/image/cars/luxury/audi.png',
            'capacity' => 4,
            'transmission' => 'Manual',
            'price' => 1000000,
            'status' => 'Not Available',
        ]);
        Cars::create([
            'category' => 'luxury',
            'brand' => 'Lamborghini',
            'model' => 'Gallardo',
            'icon_path' => 'assets/image/icons/luxury/lamborghini.png',
            'image_path' => 'assets/image/cars/luxury/gallardo.png',
            'capacity' => 2,
            'transmission' => 'Manual',
            'price' => 3500000,
            'status' => 'Available',
        ]);
    }
}
