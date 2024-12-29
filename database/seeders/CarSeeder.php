<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Cars;

class CarSeeder extends Seeder
{
    public function run()
    {
        // Membuat direktori untuk menyimpan gambar mobil jika belum ada
        Storage::disk('public')->makeDirectory('assets/cars/family');
        Storage::disk('public')->makeDirectory('assets/cars/commercial');
        Storage::disk('public')->makeDirectory('assets/cars/luxury');

        $luxuryCarImages = [
            [
                'brand' => 'Honda',
                'model' => 'Brio',
                'category' => 'family',
                'image_url' => 'assets/cars/family/pickup.png',
                'capacity' => '4',
                'transmission' => 'Manual',
                'lunggage_capacity' => '500 L',
                'features' => 'AC',
                'fuel_type' => 'Bensin',
                'fuel_consumption' => '12 km/l',
                'price' => 3500000,
                'status' => 'Tersedia',
            ],
            [
                'brand' => 'Toyota',
                'model' => 'Pickup',
                'category' => 'commercial',
                'image_url' => 'assets/cars/family/avanza.png',
                'capacity' => '2',
                'transmission' => 'Manual',
                'lunggage_capacity' => '500 L',
                'features' => 'Sunroof',
                'fuel_type' => 'Bensin',
                'fuel_consumption' => '12 km/l',
                'price' => 200000,
                'status' => 'Tersedia',
            ],
            [
                'brand' => 'Audi',
                'model' => 'V6',
                'category' => 'luxury',
                'image_url' => 'assets/ev.png',
                'capacity' => '2',
                'transmission' => 'Automatic',
                'lunggage_capacity' => '450 L',
                'features' => 'AC',
                'fuel_type' => 'Diesel',
                'fuel_consumption' => '15 km/l',
                'price' => 4000000,
                'status' => 'available',
            ],
        ];

        foreach ($luxuryCarImages as $car) {
            Cars::create([
                'category' => $car['category'],
                'brand' => $car['brand'],
                'model' => $car['model'],
                'image_url' => $car['image_url'],
                'capacity' => $car['capacity'],
                'transmission' => $car['transmission'],
                'lunggage_capacity' => $car['lunggage_capacity'],
                'features' => $car['features'],
                'fuel_type' => $car['fuel_type'],
                'fuel_consumption' => $car['fuel_consumption'],
                'price' => $car['price'],
                'status' => $car['status'],
            ]);
        }
    }
}
