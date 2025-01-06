@extends('layouts.app')
@section('title', 'Detail Mobil')

@section('content')
    <div class="content">
        <h1 class="mb-2">Detail Mobil: {{ $car->brand }} - {{ $car->model }}</h1>

        <div class="mb-4">
            @if ($car->image_url)
                <img src="{{ $car->image_url }}" alt="{{ $car->model }}" class="w-full h-48 object-scale-down rounded-md">
            @else
                <div class="w-full h-48 bg-gray-300 rounded-md flex items-center justify-center">
                    <span>No image</span>
                </div>
            @endif
        </div>

        <div>
            <p><strong>Kategori:</strong> {{ $car->category }}</p>
            <p><strong>Harga:</strong> Rp. {{ number_format($car->price, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ $car->status }}</p>
            <p><strong>Tahun:</strong> {{ $car->year }}</p>
            <p><strong>Warna:</strong> {{ $car->color }}</p>
            <p><strong>Kapasitas:</strong> {{ $car->capacity }}</p>
            <p><strong>Transmisi:</strong> {{ $car->transmission }}</p>
            <p><strong>Kapasitas Bagasi:</strong> {{ $car->luggage_capacity }}</p>
            <p><strong>Jenis Bahan Bakar:</strong> {{ $car->fuel_type }}</p>
            <p><strong>Konsumsi Bahan Bakar:</strong> {{ $car->fuel_consumption }}</p>
        </div>
    </div>
@endsection
