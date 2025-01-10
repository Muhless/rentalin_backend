@extends('layouts.app')

@section('content')
    <div class="p-6 bg-white">
        <h1 class="text-3xl font-bold mb-8">Detail Rental</h1>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">ID Rental</strong>
            <span class="w-10/12">: {{ $rental->id }}</span>
        </div>
        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">Customer</strong>
            <span class="w-10/12">: {{ $rental->user->username }}</span>
        </div>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">No Telepon</strong>
            <span class="w-10/12">: {{ $rental->user->phone }}</span>
        </div>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">Mobil</strong>
            <span class="w-10/12">: {{ $rental->car->brand }} {{ $rental->car->model }}</span>
        </div>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">Tanggal Perentalan</strong>
            <span:
                class="w-10/12">: {{ \Carbon\Carbon::parse($rental->rent_date)->locale('id')->isoFormat('D MMMM YYYY') }}</span:>
        </div>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">Tanggal Selesai</strong>
            <span:
                class="w-10/12">: {{ \Carbon\Carbon::parse($rental->return_date)->locale('id')->isoFormat('D MMMM YYYY') }}</span:>
        </div>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">Durasi Rental</strong>
            <span class="w-10/12">: {{ $rental->rent_duration }} Hari</span>
        </div>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">Driver</strong>
            <span class="w-10/12">: {{ $rental->driver }}</span>
        </div>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">Tanggal Pengembalian Mobil</strong>
            <span class="w-10/12">:
                {{ \Carbon\Carbon::parse($rental->actual_return_date)->locale('id')->isoFormat('D MMMM YYYY') }}
            </span>
        </div>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">Keterlambatan</strong>
            <span class="w-10/12">: {{ $rental->late_days }} Hari</span>
        </div>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">Denda</strong>
            <span class="w-10/12">: Rp. {{ number_format($rental->penalty_fee, 0, ',', '.') }}</span>
        </div>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">Total</strong>
            <span class="w-10/12">: Rp. {{ number_format($rental->total, 0, ',', '.') }}</span>
        </div>

        <div class="mb-4 flex justify-between">
            <strong class="w-1/3">Status</strong>
            <span class="w-10/12">: {{ $rental->status }}</span>
        </div>



        <div class="flex justify-between mt-4">
            <a href="{{ route('returns.index') }}"
                class="bg-gray-500 h-10 w-32 text-white rounded-md flex items-center justify-center">
                Kembali
            </a>
        </div>
    </div>
@endsection
