<?php

namespace Database\Seeders;

use App\Models\FamilyCar;
use Illuminate\Database\Seeder;

class FamilyCarSeeder extends Seeder
{
    public function run(): void
    {

        FamilyCar::create([
            'brand' => 'Honda',
            'model' => 'Brio',
            'icon_path' => 'assets/image/icons/family/toyota.png',
            'image_path' => 'assets/image/cars/family/honda.png',
            'kapasitas' => 4,
            'transmisi' => 'Manual',
            'harga' => 150000,
        ]);

        FamilyCar::create([
            'brand' => 'Honda',
            'model' => 'Brio',
            'icon_path' => 'assets/image/icons/family/toyota.png',
            'image_path' => 'assets/image/cars/family/brio.png',
            'kapasitas' => 4,
            'transmisi' => 'Automatic',
            'harga' => 200000,
        ]);

        FamilyCar::create([
            'brand' => 'Mitsubishi',
            'model' => 'Pajero',
            'icon_path' => 'assets/image/icons/family/mitshubishi.png',
            'image_path' => 'assets/image/cars/family/pajero.png',
            'kapasitas' => 4,
            'transmisi' => 'Automatic',
            'harga' => 400000,
        ]);

        FamilyCar::create([
            'brand' => 'Toyota',
            'model' => 'Avanza',
            'icon_path' => 'assets/image/icons/family/toyota.png',
            'image_path' => 'assets/image/cars/family/avanza.png',
            'kapasitas' => 4,
            'transmisi' => 'Manual',
            'harga' => 320000,
        ]);
    }
}
