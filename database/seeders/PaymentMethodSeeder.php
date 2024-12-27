<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    public function run()
    {
        // Memastikan PaymentMethod dengan payment_id tertentu sudah ada sebelum menambahkannya
        PaymentMethod::firstOrCreate([
            'payment_id' => 1,
            'name' => 'Credit Card',
        ]);

        PaymentMethod::firstOrCreate([
            'payment_id' => 1,
            'name' => 'Debit Card',
        ]);

        PaymentMethod::firstOrCreate([
            'payment_id' => 2,
            'name' => 'PayPal',
        ]);

        PaymentMethod::firstOrCreate([
            'payment_id' => 3,
            'name' => 'Bank Transfer',
        ]);
    }
}
