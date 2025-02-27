<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::where('status', 'Tersedia')->get();
        return response()->json($cars);
    }


    public function show($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json($car);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'string|max:50',
            'brand' => 'string|max:50',
            'model' => 'string|max:50',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
            'price' => 'numeric',
            'status' => 'string|max:50',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public');
        }

        $car = Car::create([
            'category' => $request->category,
            'brand' => $request->brand,
            'model' => $request->model,
            'image_url' => $imagePath ? asset('storage/' . $imagePath) : null,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return response()->json($car, 201);
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $request->validate([
            'category' => 'string|max:50',
            'brand' => 'string|max:50',
            'model' => 'string|max:50',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
            'price' => 'numeric',
            'status' => 'string|max:50',
        ]);

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public');
            $car->image_url = asset('storage/' . $imagePath);
        }

        $car->update($request->all());

        return response()->json($car);
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return response()->json(['message' => 'Car deleted successfully']);
    }
}
