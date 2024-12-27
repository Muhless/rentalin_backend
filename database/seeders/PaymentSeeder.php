<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        Payment::create([
            'amount' => 1000,
            'payment_status' => 'completed',
            'payment_date' => now(),
        ]);

       Payment::create([
            'amount' => 2000,
            'payment_status' => 'pending',
            'payment_date' => now()->addDay(),
        ]);

        Payment::create([
            'amount' => 1500,
            'payment_status' => 'completed',
            'payment_date' => now()->addDays(2),
        ]);

    }
}
