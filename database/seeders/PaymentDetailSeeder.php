<?php

namespace Database\Seeders;

use App\Models\PaymentDetail;
use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentDetailSeeder extends Seeder
{
    public function run()
    {
        $paymentMethod1 = PaymentMethod::firstOrCreate(['payment_id' => 1, 'name' => 'Credit Card']);
        $paymentMethod2 = PaymentMethod::firstOrCreate(['payment_id' => 1, 'name' => 'Debit Card']);
        $paymentMethod3 = PaymentMethod::firstOrCreate(['payment_id' => 2, 'name' => 'PayPal']);
        $paymentMethod4 = PaymentMethod::firstOrCreate(['payment_id' => 3, 'name' => 'Bank Transfer']);

        PaymentDetail::create([
            'payment_method_id' => $paymentMethod1->id,
            'detail' => 'Visa',
        ]);

        PaymentDetail::create([
            'payment_method_id' => $paymentMethod1->id,
            'detail' => 'MasterCard',
        ]);

        PaymentDetail::create([
            'payment_method_id' => $paymentMethod2->id,
            'detail' => 'Visa Debit',
        ]);

        PaymentDetail::create([
            'payment_method_id' => $paymentMethod2->id,
            'detail' => 'MasterCard Debit',
        ]);

        PaymentDetail::create([
            'payment_method_id' => $paymentMethod3->id,
            'detail' => 'PayPal Balance',
        ]);

        PaymentDetail::create([
            'payment_method_id' => $paymentMethod3->id,
            'detail' => 'PayPal Credit',
        ]);

        PaymentDetail::create([
            'payment_method_id' => $paymentMethod4->id,
            'detail' => 'Bank Transfer BCA',
        ]);

        PaymentDetail::create([
            'payment_method_id' => $paymentMethod4->id,
            'detail' => 'Bank Transfer Mandiri',
        ]);
    }
}
