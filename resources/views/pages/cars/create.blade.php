@extends('layouts.app')
@section('title', 'Tambah Mobil')

@section('content')
    <div class="content">
        <h1>Tambah Mobil Baru</h1>

        @if (session('success'))
            <div class="text-green-500 bg-green-100 border border-green-500 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tampilkan pesan error global -->
        @if ($errors->any())
            <div class="text-red-500 bg-red-100 border border-red-500 p-2 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <!-- Brand -->
            <div class="mb-4">
                <label for="brand" class="block text-gray-700">Brand:</label>
                <input type="text" name="brand" id="brand" class="w-full border-gray-300 rounded-md"
                    value="{{ old('brand') }}" required>
                @error('brand')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Model -->
            <div class="mb-4">
                <label for="model" class="block text-gray-700">Model:</label>
                <input type="text" name="model" id="model" class="w-full border-gray-300 rounded-md"
                    value="{{ old('model') }}" required>
                @error('model')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Category -->
            <div class="mb-4">
                <label for="category" class="block text-gray-700">Kategori:</label>
                <input type="text" name="category" id="category" class="w-full border-gray-300 rounded-md"
                    value="{{ old('category') }}" required>
                @error('category')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700">Harga:</label>
                <input type="number" name="price" id="price" class="w-full border-gray-300 rounded-md"
                    value="{{ old('price') }}" required>
                @error('price')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block text-gray-700">Status:</label>
                <select name="status" id="status" class="w-full border-gray-300 rounded-md" required>
                    <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Tidak Tersedia" {{ old('status') == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia
                    </option>
                </select>
                @error('status')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image Upload -->
            <div class="mb-4">
                <label for="image_url" class="block text-gray-700">Gambar:</label>
                <input type="file" name="image_url" id="image_url" class="w-full border-gray-300 rounded-md">
                @error('image_url')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection
