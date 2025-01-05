@extends('layouts.app')
@section('title', 'Daftar Mobil')

@section('content')
    <div class="content">
        <h1>Daftar Mobil</h1>
        <p>Berikut adalah daftar mobil yang tersedia:</p>

        <table class="min-w-full table-auto border-collapse">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-left bg-blue-500 text-white w-12">No</th>
                    <th class="px-4 py-2 text-left bg-blue-500 text-white w-36">Brand</th>
                    <th class="px-4 py-2 text-left bg-blue-500 text-white w-36">Model</th>
                    <th class="px-4 py-2 text-left bg-blue-500 text-white w-32">Kategori</th>
                    <th class="px-4 py-2 text-left bg-blue-500 text-white w-36">Harga</th>
                    <th class="px-4 py-2 text-left bg-blue-500 text-white w-24">Status</th>
                    <th class="px-4 py-2 text-left bg-blue-500 text-white w-32">Image</th>
                    <th class="px-4 py-2 text-left bg-blue-500 text-white w-48">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $car->brand }}</td>
                        <td class="border px-4 py-2">{{ $car->model }}</td>
                        <td class="border px-4 py-2">{{ $car->category }}</td>
                        <td class="border px-4 py-2">Rp. {{ number_format($car->price, 0, ',', '.') }}</td>
                        <td class="border px-4 py-2">{{ $car->status }}</td>
                        <td class="border px-4 py-2">
                            @if ($car->image_url)
                                <img src="{{ url('storage/' . $car->image_url) }}" alt="{{ $car->model }}" class="w-24">
                            @else
                                <span>No image</span>
                            @endif
                        </td>
                        <td class="border px-4 py-2 flex justify-center items-center space-x-4">
                            <button class="w-20 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out">Edit</button>
                            <button class="w-20 bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-300 ease-in-out">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
