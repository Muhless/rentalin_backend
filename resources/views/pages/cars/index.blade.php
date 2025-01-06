@extends('layouts.app')
@section('title', 'Daftar Mobil')

@section('content')
    <div class="content">
        <h1 class="mb-2">Daftar Mobil</h1>
        <p>Berikut adalah daftar mobil yang tersedia:</p>
        <form action="{{ route('cars.create') }}" method="GET" class="mb-5">
            <button type="submit"
                class="bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Tambah Mobil
            </button>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mt-5">
        {{-- <div class="flex flex-row w-2/3 "> --}}
            @foreach ($cars as $car)
              <div class="bg-white shadow-md rounded-lg p-4 border hover:shadow-xl transition-all duration-300">
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
                            <h2 class="text-xl font-semibold mb-2">{{ $car->brand }} - {{ $car->model }}</h2>
                        </div>
                        <p class="text-sm text-gray-600">Kategori : {{ $car->category }}</p>
                        <p class="text-lg font-bold text-green-500 mt-2">Rp. {{ number_format($car->price, 0, ',', '.') }}
                        </p>
                        <div class="flex justify-between">
                            <p class="text-sm {{ $car->status === 'Tersedia' ? 'text-green-500' : 'text-red-500' }}">
                                {{ $car->status }}
                            </p>
                            <div>
                                <a href="{{ route('cars.edit', ['id' => $car->id]) }}">
                                    <button class="w-14 h-7 bg-blue-600 text-white rounded-xl">edit</button>
                                </a>
                                <button>hapus</button>
                            </div>
                        </div>
                    </div>
                </a>
              </div>
            @endforeach
        </div>
    </div>
@endsection
