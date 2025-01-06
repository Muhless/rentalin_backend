@extends('layouts.app')

@section('content')
    <h1>Edit Mobil</h1>

    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="category">Kategori:</label>
            <input type="text" id="category" name="category" value="{{ old('category', $car->category) }}" required>
        </div>

        <div>
            <label for="brand">Merek:</label>
            <input type="text" id="brand" name="brand" value="{{ old('brand', $car->brand) }}" required>
        </div>

        <div>
            <label for="model">Model:</label>
            <input type="text" id="model" name="model" value="{{ old('model', $car->model) }}" required>
        </div>
        <div>
            <label for="image_url">Gambar:</label>
            <input type="file" id="image_url" name="image_url" accept="image/*">
        </div>

        <div>
            <label for="price">Harga:</label>
            <input type="number" id="price" name="price" value="{{ old('price', $car->price) }}" required>
        </div>

        <div>
            <label for="status">Status :</label>
            <select name="status" id="status" class="w-full border-gray-300 rounded-md" required>
                <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Tidak Tersedia" {{ old('status') == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia
                </option>
            </select>
        </div>

        <button type="submit" class="bg-blue-700">Simpan Perubahan</button>
    </form>
@endsection
