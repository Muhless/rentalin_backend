@extends('layouts.app')
@section('title', 'Ubah Data Mobil')

@section('content')
    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" class="p-5 bg-white">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-4">
            <!-- Kolom Kiri -->
            <div>
                <div class="mb-4">
                    <label for="category" class="block text-gray-700 mb-2">Kategori</label>
                    <select name="category" id="category" class="w-full border-gray-300 bg-gray-100 h-10 pl-3 pr-16"
                        required>
                        <option value="Family" {{ old('category', $car->category) == 'Family' ? 'selected' : '' }}>Family
                        </option>
                        <option value="Commercial" {{ old('category', $car->category) == 'Commercial' ? 'selected' : '' }}>
                            Commercial</option>
                        <option value="Luxury" {{ old('category', $car->category) == 'Luxury' ? 'selected' : '' }}>Luxury
                        </option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="brand" class="block text-gray-700 mb-2">Brand</label>
                    <input type="text" id="brand" name="brand" class="w-full border-gray-300 bg-gray-100 h-10 pl-3"
                        value="{{ old('brand', $car->brand) }}" required>
                </div>

                <div class="mb-4">
                    <label for="model" class="block text-gray-700 mb-2">Model</label>
                    <input type="text" id="model" name="model" class="w-full border-gray-300 bg-gray-100 h-10 pl-3"
                        value="{{ old('model', $car->model) }}" required>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 mb-2">Harga</label>
                    <input type="number" id="price" name="price" class="w-full border-gray-300 bg-gray-100 h-10 pl-3"
                        value="{{ old('price', $car->price) }}" required>
                </div>

                <div class="mb-4">
                    <label for="status" class="block text-gray-700 mb-2">Status</label>
                    <select name="status" id="status" class="w-full border-gray-300 bg-gray-100 h-10 pl-3" required>
                        <option value="Tersedia" {{ old('status', $car->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia
                        </option>
                        <option value="Tidak Tersedia"
                            {{ old('status', $car->status) == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                    </select>
                </div>


            </div>

            <!-- Kolom Kanan -->
            <div>
                <div class="mb-4">
                    <label for="capacity" class="block text-gray-700 mb-2">Kapasitas Penumpang</label>
                    <select name="capacity" id="capacity" class="w-full border-gray-300 bg-gray-100 h-10 pl-3 pr-16"
                        required>
                        <option value="2 penumpang" {{ old('capacity', $car->capacity) == '2 penumpang' ? 'selected' : '' }}>2 Penumpang
                        </option>
                        <option value="4 penumpang" {{ old('capacity', $car->capacity) == '4 penumpang' ? 'selected' : '' }}>
                            4 Penumpang</option>
                        <option value="6 penumpang" {{ old('capacity', $car->capacity) == '6 penumpang' ? 'selected' : '' }}>6
                            Penumpang
                        </option>
                        <option value="8 penumpang" {{ old('capacity', $car->capacity) == '8 penumpang' ? 'selected' : '' }}>8
                            Penumpang
                        </option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="transmission" class="block text-gray-700 mb-2">Transmisi</label>
                    <select name="transmission" id="transmission" class="w-full border-gray-300 bg-gray-100 h-10 pl-3 pr-16"
                        required>
                        <option value="manual" {{ old('transmission', $car->transmission) == 'manual' ? 'selected' : '' }}>
                            Manual
                        </option>
                        <option value="matic" {{ old('transmission', $car->transmission) == 'matic' ? 'selected' : '' }}>
                            Matic</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="luggage_capacity" class="block text-gray-700 mb-2">Kapasitas Bagasi</label>
                    <input type="number" id="luggage_capacity" name="luggage_capacity"
                        class="w-full border-gray-300 bg-gray-100 h-10 pl-3"
                        value="{{ old('luggage_capacity', $car->luggage_capacity) }}">
                </div>

                <div class="mb-4">
                    <label for="fuel_type" class="block text-gray-700 mb-2">Jenis Bahan Bakar</label>
                    <select name="fuel_type" id="fuel_type" class="w-full border-gray-300 bg-gray-100 h-10 pl-3 pr-16"
                        required>
                        <option value="pertalite" {{ old('fuel_type', $car->fuel_type) == 'pertalite' ? 'selected' : '' }}>
                            Pertalite
                        </option>
                        <option value="pertamax" {{ old('fuel_type', $car->fuel_type) == 'pertamax' ? 'selected' : '' }}>
                            Pertamax</option>
                        <option value="diesel" {{ old('fuel_type', $car->fuel_type) == 'diesel' ? 'selected' : '' }}>
                            Diesel</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="fuel_consumption" class="block text-gray-700 mb-2">Konsumsi Bahan Bakar</label>
                    <input type="number" id="fuel_consumption" name="fuel_consumption"
                        class="w-full border-gray-300 bg-gray-100 h-10 pl-3"
                        value="{{ old('fuel_consumption', $car->fuel_consumption) }}">
                </div>
            </div>
            <div class="mb-4">
                <label for="image_url" class="block text-gray-700 mb-2">Gambar</label>
                <input type="file" id="image_url" name="image_url" accept="image/*" class="h-10">
            </div>
        </div>

        <div class="flex justify-end mt-7">
            <a href="{{ route('cars.show', ['id' => $car->id]) }}"
                class="bg-gray-500 h-10 w-32 text-white rounded-md flex items-center justify-center">
                Kembali
            </a>
            <button type="submit"
                class="ml-3 w-32 px-4 py-2 rounded-md bg-blue-700 text-white h-10 hover:bg-blue-800">Simpan</button>
        </div>
    </form>
@endsection
