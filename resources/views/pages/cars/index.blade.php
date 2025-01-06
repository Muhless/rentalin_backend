@extends('layouts.app')
@section('title', 'Daftar Mobil')

@section('content')
    <div class="content">
        <h1 class="mb-2">Daftar Mobil</h1>
        <p>Berikut adalah daftar mobil yang tersedia:</p>
        <form action="{{ route('cars.store') }}" method="POST">
            <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Tambah Mobil
            </button>
        </form>



        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-5">
            @foreach ($cars as $car)
                <div class="card bg-white shadow-md rounded-lg p-4 border">
                    <div class="mb-4">
                        @if ($car->image_url)
                            <img src="{{ url('storage/' . $car->image_url) }}" alt="{{ $car->model }}"
                                class="w-full h-48 object-cover rounded-md">
                        @else
                            <div class="w-full h-48 bg-gray-300 rounded-md flex items-center justify-center">
                                <span>No image</span>
                            </div>
                        @endif
                    </div>

                    <div class=" justify-between h-full">
                        <h2 class="text-xl font-semibold mb-2">{{ $car->brand }} - {{ $car->model }}</h2>
                        <p class="text-sm text-gray-600">Kategori : {{ $car->category }}</p>
                        <p class="text-lg font-bold text-green-500 mt-2">Rp. {{ number_format($car->price, 0, ',', '.') }}
                        </p>
                        <p class="text-sm text-gray-500 mb-4">Status : {{ $car->status }}</p>

                        <div class="flex justify-between items-center">
                            <form action="{{ route('cars.edit', $car->id) }}" method="GET">
                                @csrf
                                <button type="submit" class="btn btn-primary text-white py-2 px-4 rounded-md">
                                    Edit
                                </button>
                            </form>

                            <form action="{{ route('cars.delete', $car->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger text-white py-2 px-4 rounded-md">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
