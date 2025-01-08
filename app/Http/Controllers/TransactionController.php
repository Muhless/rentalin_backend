<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['rental.user', 'rental.car'])->get();
        return view('pages.transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rental_id' => 'required|exists:rentals,id',
            'actual_return_date' => 'nullable|date',
            'late_days' => 'required|integer',
            'penalty_fee' => 'required|integer',
            'total' => 'required|integer|min:0',
            'status' => 'required|string',
        ]);

        Transaction::create($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully!');
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'actual_return_date' => 'nullable|date',
            'late_days' => 'required|integer',
            'penalty_fee' => 'required|integer',
            'total' => 'required|integer|min:0',
            'status' => 'required|string',
        ]);

        $transaction->update($validated);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }

    public function updateStatus(Request $request, Transaction $rental)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:Sedang Berlangsung,Selesai,Dibatalkan',
        ]);
        $rental->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'status transaksi berhasil diubah.');
    }
}
