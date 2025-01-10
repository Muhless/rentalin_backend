@extends('layouts.app')

@section('title', 'Daftar Pengembalian')

@section('content')
    <div class="p-6 bg-white">
        <h1 class="text-3xl font-bold mb-4">Daftar Pengembalian</h1>
        <form action="{{ route('returns.index') }}" method="GET" class="mb-5">
            <div class="flex items-center space-x-4">
                <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="Cari rental"
                    class="bg-gray-100 w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                @if (request()->query('search'))
                    <a href="{{ route('returns.index') }}"
                        class="bg-red-600 text-white py-2 px-6 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                        Hapus
                    </a>
                @endif
                <button type="submit"
                    class="bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Cari
                </button>
            </div>
        </form>

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
                    <th class="py-3 px-2 border text-center">Status</th>
                    <th class="py-3 px-2 border text-center">Detail</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($rentals as $rental)
                    <tr class="text-sm">
                        <td class="py-3 px-2 border text-center ">{{ $loop->iteration }}</td>
                        <td class="py-3 px-2 border">{{ $rental->user->username }}</td>
                        <td class="py-3 px-2 border text-center">
                            {{ $rental->car->brand }} {{ $rental->car->model }}
                        </td>
                        <td class="py-3 border text-center">
                            {{ $rental->return_date->isoFormat('DD MMMM Y') }}</td>
                        <td class="py-3 border text-center">
                            {{ \Carbon\Carbon::parse($rental->actual_return_date)->isoformat('DD MMMM Y') ?? '-' }}
                        </td>
                        <td class="py-3 px-2 border text-center">{{ $rental->late_days }} hari</td>
                        <td class="py-3 px-2 border text-end">Rp.
                            {{ number_format($rental->penalty_fee, 0, ',', '.') }}</td>
                        <td class="text-center mx-2 py-2 border border-gray-300
                            @if ($rental->status === 'Selesai') bg-green-200
                            @elseif ($rental->status === 'Ditolak')
                                bg-red-200
                            @else
                                bg-yellow-200 @endif
                            text-black"
                            readonly>
                            {{ $rental->status }}
                        </td>

                        <td class="py-3 px-2 border text-center">
                            <a href="{{ route('rentals.show', $rental->id) }}"
                                class="text-blue-500 hover:underline">lihat</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="py-6 text-center text-gray-500">Belum ada data pengembalian.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
