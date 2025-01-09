@extends('layouts.app')

@section('content')
    <div class="p-6 bg-white">
        <h1 class="text-3xl font-bold mb-4">Detail Transaksi</h1>
        <h2 class="text-xl font-semibold mb-2">Transaction #{{ $transaction->id }}</h2>
        <div class="mb-2">
            <strong>Rental ID:</strong> {{ $transaction->rental_id }}
        </div>
        <div class="mb-2">
            <strong>Actual Return Date:</strong>
            {{ \Carbon\Carbon::parse($transaction->actual_return_date)->format('d-m-Y') }}
        </div>
        <div class="mb-2">
            <strong>Late Days:</strong> {{ $transaction->late_days }}
        </div>
        <div class="mb-2">
            <strong>Penalty Fee:</strong> Rp. {{ number_format($transaction->penalty_fee, 0, ',', '.') }}
        </div>
        <div class="mb-2">
            <strong>Total:</strong> Rp. {{ number_format($transaction->total, 0, ',', '.') }}
        </div>
        <div class="mb-2">
            <strong>Status:</strong> {{ $transaction->status }}
        </div>
        <div class="mb-2">
            <strong>User:</strong> {{ $transaction->rental->user->username ?? '-' }}
            ({{ $transaction->rental->user->phone ?? '-' }})
        </div>
    @endsection
