<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['rental.user', 'rental.car'])->get();
        return response()->json([
            'success' => true,
            'data' => $transactions,
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'actual_return_date' => 'nullable|date',
            'late_days' => 'required|integer',
            'penalty_fee' => 'required|integer',
            'status' => 'required|string',
        ]);

        $transaction = Transaction::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Transaction created successfully!',
            'data' => $transaction,
        ], 201);
    }

    public function show(Transaction $transaction)
    {
        $transaction->load(['rental.user', 'rental.car']);
        return response()->json([
            'success' => true,
            'data' => $transaction,
        ], 200);
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'actual_return_date' => 'nullable|date',
            'late_days' => 'required|integer',
            'penalty_fee' => 'required|integer',
            'status' => 'required|string',
        ]);

        $transaction->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Transaction updated successfully!',
            'data' => $transaction,
        ], 200);
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return response()->json([
            'success' => true,
            'message' => 'Transaction deleted successfully!',
        ], 200);
    }
}
