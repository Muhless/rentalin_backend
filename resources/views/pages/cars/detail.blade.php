@extends('layouts.app')
@section('title', 'Detail Mobil')

@section('content')
    <div class="content bg-white rounded-2xl p-10">
        <a href="{{ route('cars.index') }}">
            <img src="{{ asset('images/back.png') }}" alt="back" class="w-10">
        </a>
        <div class="mb-4">
            @if ($car->image_url)
                <img src="{{ $car->image_url }}" alt="{{ $car->model }}" class="w-full h-48 object-scale-down rounded-md">
            @else
                <div class="w-full h-48 bg-gray-300 rounded-md flex items-center justify-center">
                    <span>No image</span>
                </div>
            @endif
        </div>

        <div class="space-y-2">
            <p class="text-3xl font-bold mb-4 underline">{{ $car->brand }} {{ $car->model }}</p>
            <div class="flex">
                <p class="text-lg font-semibold w-1/6">Kategori</p>
                <p class="text-lg font-normal text-gray-700">: {{ $car->category }}</p>
            </div>

            <div class="flex ">
                <p class="text-lg font-semibold w-1/6">Kapasitas</p>
                <p class="text-lg font-normal text-gray-700 w-2/3">: {{ $car->capacity }} </p>
            </div>
            <div class="flex ">
                <p class="text-lg font-semibold w-1/6">Transmisi</p>
                <p class="text-lg font-normal text-gray-700 w-2/3">: {{ $car->transmission }}</p>
            </div>
            <div class="flex ">
                <p class="text-lg font-semibold w-1/6">Kapasitas Bagasi</p>
                <p class="text-lg font-normal text-gray-700 w-2/3">: {{ $car->luggage_capacity }} liter</p>
            </div>
            <div class="flex ">
                <p class="text-lg font-semibold w-1/6">Jenis Bahan Bakar</p>
                <p class="text-lg font-normal text-gray-700 w-2/3">: {{ $car->fuel_type }}</p>
            </div>
            <div class="flex ">
                <p class="text-lg font-semibold w-1/6">Konsumsi Bahan Bakar</p>
                <p class="text-lg font-normal text-gray-700 w-2/3">: {{ $car->fuel_consumption }} liter/Km</p>
            </div>
            <div class="flex ">
                <p class="text-lg font-semibold w-1/6">Harga</p>
                <p class="text-lg font-normal text-gray-700 w-2/3">: Rp. {{ number_format($car->price, 0, ',', '.') }}</p>
            </div>
            <div class="flex ">
                <p class="text-lg font-semibold w-1/6">Status</p>
                <p class="text-lg font-normal text-gray-700 w-2/3">: {{ $car->status }}</p>
            </div>

            <div class="flex justify-end">
                <form action="{{ route('cars.destroy', ['id' => $car->id]) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data mobil ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="ml-3 w-32 h-10 bg-red-600 text-white rounded-md">
                        Hapus
                    </button>
                </form>
                <a href="{{ route('cars.edit', ['id' => $car->id]) }}">
                    <button class="ml-3 w-32 h-10 bg-blue-600 text-white rounded-md">Ubah</button>
                </a>
            </div>
        </div>
    </div>
@endsection
