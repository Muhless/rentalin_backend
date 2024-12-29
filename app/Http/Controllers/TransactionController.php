<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Show all transactions
    public function index()
    {
        $transactions = Transaction::all();
        return response()->json($transactions);
    }

    // Show a single transaction
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);
        return response()->json($transaction);
    }

    // Create a new transaction
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'car_id' => 'required',
            'payment_id' => 'required',
            'rent_date' => 'required|date',
            'return_date' => 'required|date',
            'rent_duration' => 'required|integer',
            'total' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $transaction = Transaction::create($request->all());

        return response()->json($transaction, 201);
    }

    // Update a transaction
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->update($request->all());

        return response()->json($transaction);
    }

    // Delete a transaction
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return response()->json(['message' => 'Transaction deleted successfully']);
    }
}
