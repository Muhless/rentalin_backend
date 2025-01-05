@extends('layouts.app')
@section('title', 'Edit Mobil')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Mobil</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-light p-4 rounded shadow-sm">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="category" class="form-label">Kategori</label>
                <input type="text" id="category" name="category" class="form-control"
                    value="{{ old('category', $car->category) }}" required>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" id="brand" name="brand" class="form-control"
                    value="{{ old('brand', $car->brand) }}" required>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" id="model" name="model" class="form-control"
                    value="{{ old('model', $car->model) }}" required>
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Gambar</label>
                <input type="file" id="image_url" name="image_url" class="form-control" aria-describedby="imageHelp">
                <small id="imageHelp" class="form-text text-muted">Pilih gambar untuk memperbarui foto mobil
                    (opsional).</small>
                @if ($car->image_url)
                    <div class="mt-2">
                        <img src="{{ url('storage/' . $car->image_url) }}" alt="{{ $car->model }}"
                            class="img-thumbnail w-28">
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <input type="number" id="price" name="price" class="form-control"
                    value="{{ old('price', $car->price) }}" required>
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input type="text" id="status" name="status" class="form-control"
                    value="{{ old('status', $car->status) }}" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
        </form>
    </div>
@endsection
