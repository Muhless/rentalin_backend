<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for transaction
        Transaction::create([
            'user_id' => 1,
            'car_id' => 1,
            'payment_id' => 1,
            'rent_date' => '2024-12-01',
            'return_date' => '2024-12-10',
            'rent_duration' => '10',
            'total' => 1000000,
            'status' => 'completed',
        ]);

        Transaction::create([
            'user_id' => 2,
            'car_id' => 2,
            'payment_id' => 2,
            'rent_date' => '2024-12-05',
            'return_date' => '2024-12-12',
            'rent_duration' => '7',
            'total' => 700000,
            'status' => 'pending',
        ]);

        // You can add more sample data as needed
    }
}
