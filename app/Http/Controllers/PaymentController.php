<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    // Menampilkan semua data pembayaran beserta detail dan metode pembayarannya
    public function index()
    {
        // Memuat relasi paymentMethod dan paymentDetails pada Payment
        $payments = Payment::with('paymentMethod.paymentDetails')->get();
        return response()->json($payments);
    }

    // Menyimpan data pembayaran baru
    public function store(Request $request)
    {
        // Validasi input yang diterima
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0',
            'payment_status' => 'required|string',
        ]);

        // Jika validasi gagal, kembalikan pesan error
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Menyimpan data pembayaran baru ke database
        $payment = Payment::create($request->only(['amount', 'payment_status']));
        return response()->json($payment, 201);
    }

    // Menampilkan detail pembayaran berdasarkan ID
    public function show($id)
    {
        // Mengambil data pembayaran dengan relasi paymentMethod dan paymentDetails
        $payment = Payment::with('paymentMethod.paymentDetails')->find($id);

        // Jika data pembayaran tidak ditemukan, kembalikan pesan error
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Kembalikan data pembayaran dengan relasi terkait
        return response()->json($payment);
    }

    // Mengupdate data pembayaran berdasarkan ID
    public function update(Request $request, $id)
    {
        // Validasi input yang diterima
        $validator = Validator::make($request->all(), [
            'amount' => 'required|numeric|min:0',
            'payment_status' => 'required|string',
        ]);

        // Jika validasi gagal, kembalikan pesan error
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        // Mencari data pembayaran berdasarkan ID
        $payment = Payment::find($id);

        // Jika data pembayaran tidak ditemukan, kembalikan pesan error
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Mengupdate data pembayaran dengan input yang diterima
        $payment->update($request->only(['amount', 'payment_status']));
        return response()->json($payment);
    }

    // Menghapus data pembayaran berdasarkan ID
    public function destroy($id)
    {
        // Mencari data pembayaran berdasarkan ID
        $payment = Payment::find($id);

        // Jika data pembayaran tidak ditemukan, kembalikan pesan error
        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        // Menghapus data pembayaran
        $payment->delete();
        return response()->json(['message' => 'Payment deleted successfully']);
    }
}
