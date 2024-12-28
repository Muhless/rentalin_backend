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
        ]);

       Payment::create([
            'amount' => 2000,
            'payment_status' => 'pending',
        ]);

        Payment::create([
            'amount' => 1500,
            'payment_status' => 'completed',
        ]);

    }
}
