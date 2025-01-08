@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@section('content')
    <div class="p-6 bg-white">
        <h1 class="text-3xl font-bold mb-4">Daftar Transaksi</h1>
        <table class="min-w-full shadow-md bg-white border border-gray-200 rounded-lg overflow-hidden mt-6">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="py-3 px-2 border text-center">No</th>
                    <th class="py-3 px-2 border text-center">Customer</th>
                    <th class="py-3 px-2 border text-center">Mobil</th>
                    <th class="py-3 border text-center">Tanggal Pengembalian</th>
                    <th class="py-3 border text-center">Tanggal Dikembalikan</th>
                    <th class="py-3 px-2 border text-center">Keterlambatan</th>
                    <th class="py-3 px-10 border text-center">Denda</th>
                    <th class="py-3 px-10 border text-center">Total</th>
                    <th class="py-3 px-2 border text-center">Keterangan</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($transactions as $transaction)
                    <tr class="text-sm">
                        <td class="py-3 px-2 border text-center">{{ $loop->iteration }}</td>
                        <td class="py-3 px-2 border">{{ $transaction->rental->user->username }}</td>
                        <td class="py-3 px-2 border text-center">
                            {{ $transaction->rental->car->brand }} {{ $transaction->rental->car->model }}
                        </td>
                        <td class="py-3 border text-center">
                            {{ $transaction->rental->return_date->isoFormat('DD MMMM Y') }}</td>
                        <td class="py-3 border text-center">
                            {{ \Carbon\Carbon::parse($transaction->actual_return_date)->isoformat('DD MMMM Y') ?? '-' }}
                        </td>
                        <td class="py-3 px-2 border text-center">{{ $transaction->late_days }} hari</td>
                        <td class="py-3 px-2 border text-center">Rp.
                            {{ number_format($transaction->penalty_fee, 0, ',', '.') }}</td>
                        <td class="py-3 px-2 border text-center">Rp.
                            {{ number_format($transaction->total, 0, ',', '.') }}</td>
                        <td
                            class="text-center bg-blue-200
                            @if ($transaction->status === 'Sedang Berlangsung') bg-blue-200
                            @elseif ($transaction->status === 'Selesai') bg-green-200
                            @elseif ($transaction->status === 'Dibatalkan') bg-red-200 @endif text-black">
                            <form action="{{ route('transactions.updateStatus', $transaction->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if ($transaction->status === 'Selesai' || $transaction->status === 'Dibatalkan')
                                    <input type="text" value="{{ $transaction->status }}"
                                        class="mx-2 py-2 rounded-lg border border-gray-300 text-black text-center" readonly>
                                @else
                                    <select name="status"
                                        class="px-2 py-2 rounded-lg border border-gray-300 text-black bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        onchange="this.form.submit()">
                                        <option value="Sedang Berlangsung"
                                            {{ $transaction->status == 'Sedang Berlangsung' ? 'selected' : '' }}>
                                            Sedang Berlangsung
                                        </option>
                                        <option value="Selesai" {{ $transaction->status == 'Selesai' ? 'selected' : '' }}>
                                            Selesai
                                        </option>
                                        <option value="Dibatalkan"
                                            {{ $transaction->status == 'Dibatalkan' ? 'selected' : '' }}>
                                            Dibatalkan
                                        </option>
                                    </select>
                                @endif
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="py-6 text-center text-gray-500">Belum ada data transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
