<?php

namespace App\Http\Controllers;

use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentDetailController extends Controller
{
    public function index()
    {
        $paymentDetails = PaymentDetail::with('paymentMethod')->get();
        return response()->json($paymentDetails);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_method_id' => 'required|exists:payment_methods,id',
            'detail' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $paymentDetail = PaymentDetail::create($request->all());
        return response()->json($paymentDetail, 201);
    }

    public function show($id)
    {
        $paymentDetail = PaymentDetail::with('paymentMethod')->find($id);
        if (!$paymentDetail) {
            return response()->json(['message' => 'Payment detail not found'], 404);
        }
        return response()->json($paymentDetail);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'payment_method_id' => 'required|exists:payment_methods,id',
            'detail' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $paymentDetail = PaymentDetail::find($id);
        if (!$paymentDetail) {
            return response()->json(['message' => 'Payment detail not found'], 404);
        }

        $paymentDetail->update($request->all());
        return response()->json($paymentDetail);
    }

    public function destroy($id)
    {
        $paymentDetail = PaymentDetail::find($id);

        if (!$paymentDetail) {
            return response()->json(['message' => 'Payment detail not found'], 404);
        }

        $paymentDetail->delete();
        return response()->json(['message' => 'Payment detail deleted successfully']);
    }
}
