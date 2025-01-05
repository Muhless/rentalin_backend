@extends('layouts.app')
@section('title', 'Tambah Mobil')

@section('content')
    <div class="content">
        <h1>Tambah Mobil Baru</h1>

        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="brand" class="block text-gray-700">Brand:</label>
                <input type="text" name="brand" id="brand" class="w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="model" class="block text-gray-700">Model:</label>
                <input type="text" name="model" id="model" class="w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="category" class="block text-gray-700">Kategori:</label>
                <input type="text" name="category" id="category" class="w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Harga:</label>
                <input type="number" name="price" id="price" class="w-full border-gray-300 rounded-md" required>
            </div>
            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status:</label>
                <select name="status" id="status" class="w-full border-gray-300 rounded-md" required>
                    <option value="available">Available</option>
                    <option value="unavailable">Unavailable</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="image_url" class="block text-gray-700">Gambar:</label>
                <input type="file" name="image_url" id="image_url" class="w-full border-gray-300 rounded-md">
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
