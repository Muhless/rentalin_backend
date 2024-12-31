<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Contoh data dummy untuk transaksi
        Transaction::create([
            'users' => 'admin',
            'cars' => 'Toyota Pickup',
            'rent_date' => '2025-01-02',
            'return_date' => '2025-01-06',
            'rent_duration' => 4,
            'payment' => 'Credit Card',
            'total' => 1200000,
            'status' => 'Pending',
        ]);

        Transaction::create([
            'users' => 'john_doe',
            'cars' => 'Honda CRV',
            'rent_date' => '2025-01-10',
            'return_date' => '2025-01-15',
            'rent_duration' => 5,
            'payment' => 'Cash',
            'total' => 1500000,
            'status' => 'Completed',
        ]);

        Transaction::create([
            'users' => 'jane_doe',
            'cars' => 'Suzuki Carry',
            'rent_date' => '2025-01-18',
            'return_date' => '2025-01-22',
            'rent_duration' => 4,
            'payment' => 'Bank Transfer',
            'total' => 1000000,
            'status' => 'Cancelled',
        ]);
    }
}
