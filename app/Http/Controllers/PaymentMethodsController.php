<?php

namespace App\Http\Controllers;

use App\Models\PaymentDetail;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentDetails = PaymentDetail::with('paymentMethod')->get();
        return response()->json($paymentDetails);
    }

    // Menampilkan data PaymentMethod berdasarkan ID
    public function show($id)
    {
        $paymentMethod = PaymentMethod::find($id);

        if (!$paymentMethod) {
            return response()->json(['message' => 'Payment Method not found'], 404);
        }

        return response()->json($paymentMethod);
    }

    // Menyimpan data PaymentMethod baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_id' => 'required|integer',
            'name' => 'required|string|max:20',
        ]);
        $paymentMethod = PaymentMethod::create($validated);
        return response()->json($paymentMethod, 201);
    }

    public function update(Request $request, $id)
    {
        $paymentMethod = PaymentMethod::find($id);

        if (!$paymentMethod) {
            return response()->json(['message' => 'Payment Method not found'], 404);
        }

        $validated = $request->validate([
            'payment_id' => 'required|integer',
            'name' => 'required|string|max:20',
        ]);
        $paymentMethod->update($validated);
        return response()->json($paymentMethod);
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        if (!$paymentMethod) {
            return response()->json(['message' => 'Payment Method not found'], 404);
        }
        $paymentMethod->delete();
        return response()->json(['message' => 'Payment Method deleted successfully']);
    }
}
