<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Feature;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('feature')->get();
        return view('pages.cars.index', compact('cars'));
    }

    public function show($id)
    {
        $car = Car::with('feature')->find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json($car);
    }

    // Menambah mobil baru
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'image_url' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|string',
            'feature_id' => 'required|exists:features,id',
        ]);

        $car = Car::create($request->all());

        return view('pages.cars.create');

    }

    public function update(Request $request, $id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $request->validate([
            'category' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'image_url' => 'required|string',
            'price' => 'required|numeric',
            'status' => 'required|string',
            'feature_id' => 'required|exists:features,id',
        ]);

        $car->update($request->all());

        return response()->json($car);
    }

    public function destroy($id)
    {
        $car = Car::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        $car->delete();

        return response()->json(['message' => 'Car deleted successfully']);
    }
}
