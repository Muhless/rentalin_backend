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

    public function show($id)
    {
        $transaction = Transaction::with(['rental.user', 'rental.car'])->findOrFail($id);
        return view('pages.transactions.detail', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:Sedang Berlangsung,Selesai,Dibatalkan',
        ]);
        $transaction->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'status transaksi berhasil diubah.');
    }
}
