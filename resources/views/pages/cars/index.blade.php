@extends('layouts.app')
@section('title', 'Daftar Mobil')

@section('content')
    <div class="content p-6">
        <h1 class="text-3xl font-bold mb-4">Daftar Mobil</h1>
        <form action="{{ route('cars.create') }}" method="GET" class="mb-5">
            <button type="submit"
                class="bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Tambah Mobil
            </button>
        </form>
        <form action="{{ route('cars.index') }}" method="GET" class="mb-5">
            <div class="flex items-center space-x-4">
                <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="Cari mobil..."
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                @if (request()->query('search'))
                    <a href="{{ route('cars.index') }}"
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

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-5">
            @foreach ($cars as $car)
                <div
                    class="bg-white shadow-md rounded-lg p-4 border hover:shadow-xl transition-all duration-300 ease-in-out transform hover:scale-105">
                    <a href="{{ route('cars.show', ['id' => $car->id]) }}">
                        <div class="mb-4">
                            @if ($car->image_url)
                                <img src="{{ $car->image_url }}" alt="{{ $car->model }}"
                                    class="w-full h-48 object-scale-down rounded-md">
                            @else
                                <div class="w-full h-48 bg-gray-300 rounded-md flex items-center justify-center">
                                    <span>No image</span>
                                </div>
                            @endif
                        </div>
                        <div class="h-full">
                            <div>
                                <h2 class="text-xl font-semibold">{{ $car->brand }} {{ $car->model }}</h2>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">{{ $car->category }}</p>
                            <div class="flex justify-between items-center">
                                <p class="text-lg font-bold text-green-500">
                                    Rp.{{ number_format($car->price, 0, ',', '.') }}<span class="text-black"> /
                                        Hari</span>
                                </p>
                                <p class="text-sm {{ $car->status === 'Tersedia' ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $car->status }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
