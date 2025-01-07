@extends('layouts.app')
@section('title', 'Tambah Data Mobil')

@section('content')
    <div class="content bg-white p-5">
        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="mb-4">
                <label for="brand" class="block mb-2 text-gray-700">Brand</label>
                <input type="text" name="brand" id="brand" class="w-full h-10 border-gray-300 bg-gray-100 pl-3"
                    value="{{ old('brand') }}" required>
                @error('brand')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="model" class="block mb-2 text-gray-700">Model</label>
                <input type="text" name="model" id="model" class="w-full h-10 border-gray-300 bg-gray-100 pl-3"
                    value="{{ old('model') }}" required>
                @error('model')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category" class="block mb-2 text-gray-700">Kategori</label>
                <select name="category" id="category" class="w-full h-10 border-gray-300 bg-gray-100 pl-3" required>
                    <option value="Family" {{ old('category') == 'Family' ? 'selected' : '' }}>Family</option>
                    <option value="Commercial" {{ old('category') == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                    <option value="Luxury" {{ old('category') == 'Luxury' ? 'selected' : '' }}>Luxury</option>
                    </option>
                </select>
                @error('category')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block mb-2 text-gray-700">Harga</label>
                <input type="number" name="price" id="price" class="w-full h-10 border-gray-300 bg-gray-100 pl-3"
                    value="{{ old('price') }}" required>
                @error('price')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image_url" class="block mb-2 text-gray-700">Gambar</label>
                <input type="file" name="image_url" id="image_url">
                @error('image_url')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('cars.index') }}" class="bg-gray-500 h-10 w-32 text-white rounded-md flex items-center justify-center">
                    Kembali
                </a>
                <button type="submit" class=" ml-2 px-4 py-2 w-32 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
