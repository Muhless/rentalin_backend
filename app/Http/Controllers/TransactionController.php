<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.rents.index');
        $transactions = Transaction::all();
        return response()->json($transactions, 200);
    }

    public function show($id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        return response()->json($transaction, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'users' => 'required|string|max:255',
            'cars' => 'required|string|max:255',
            'rent_date' => 'required|date',
            'return_date' => 'required|date',
            'rent_duration' => 'required|integer',
            'payment' => 'required|string|max:255',
            'total' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);

        $transaction = Transaction::create($validatedData);
        return response()->json(['message' => 'Transaction created successfully', 'data' => $transaction], 201);
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
        $validatedData = $request->validate([
            'users' => 'nullable|string|max:255',
            'cars' => 'nullable|string|max:255',
            'rent_date' => 'nullable|date',
            'return_date' => 'nullable|date',
            'rent_duration' => 'nullable|integer',
            'payment' => 'nullable|string|max:255',
            'total' => 'nullable|integer',
            'status' => 'nullable|string|max:255',
        ]);
        $transaction->update($validatedData);
        return response()->json(['message' => 'Transaction updated successfully', 'data' => $transaction], 200);
    }

    public function destroy($id)
    {
        $transaction = Transaction::find($id);
        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }
        $transaction->delete();
        return response()->json(['message' => 'Transaction deleted successfully'], 200);
    }
}
