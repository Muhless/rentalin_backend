<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        // Memuat semua PaymentMethod dengan relasi paymentDetail
        $paymentMethods = PaymentMethod::with(['payment', 'paymentDetails'])->get();
        return response()->json($paymentMethods);
    }

    public function show($id)
    {
        // Memuat PaymentMethod berdasarkan ID beserta relasi paymentDetail
        $paymentMethod = PaymentMethod::with('paymentDetail')->find($id);

        if (!$paymentMethod) {
            return response()->json(['message' => 'Payment Method not found'], 404);
        }

        return response()->json($paymentMethod);
    }
}
