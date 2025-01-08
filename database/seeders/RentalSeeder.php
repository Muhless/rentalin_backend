<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rental;
use App\Models\User;
use App\Models\Car;
use Illuminate\Support\Carbon;

class RentalSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $cars = Car::all();

        if ($users->isEmpty() || $cars->isEmpty()) {
            $this->command->info('User atau Car data tidak tersedia. Pastikan User dan Car Seeder sudah dijalankan.');
            return;
        }

        foreach ($users as $user) {
            foreach ($cars->take(2) as $car) {
                $rentDate = Carbon::now()->subDays(rand(1, 30)); // Rent date dalam 30 hari terakhir
                $rentDuration = rand(1, 7); // Lama sewa 1-7 hari
                $returnDate = $rentDate->copy()->addDays($rentDuration); // Tanggal kembali
                $total = $rentDuration * $car->price; // Total harga (contoh sederhana)

                Rental::create([
                    'user_id' => $user->id,
                    'car_id' => $car->id,
                    'rent_date' => $rentDate,
                    'return_date' => $returnDate,
                    'rent_duration' => $rentDuration,
                    'total' => $total,
                    'status' => 'Menunggu Persetujuan',
                ]);
            }
        }

        $this->command->info('Rental seeder berhasil dijalankan!');
    }
}
