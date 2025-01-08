<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Rental;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $rentals = Rental::all();

        foreach ($rentals as $rental) {
            Transaction::create([
                'rental_id' => $rental->id,
                'actual_return_date' => now()->addDays(rand(0, 10)),
                'late_days' => rand(0, 5),
                'penalty_fee' => rand(0, 50000),
                'total' => rand(0, 50000) * rand(0, 5),
                'status' => 'completed',
            ]);
        }
    }
}
