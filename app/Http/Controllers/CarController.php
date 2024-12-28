<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Cars::all()->map(function ($car) {
            return [
                'id' => $car->id,
                'category' => $car->category,
                'brand' => $car->brand,
                'model' => $car->model,
                'image_url' => $car->image_url ? url('storage/' . $car->image_url) : null,
                'capacity' => $car->capacity,
                'transmission' => $car->transmission,
                'lunggage_capacity' => $car->lunggage_capacity,
                'features' => $car->features,
                'fuel_type' => $car->fuel_type,
                'fuel_consumption' => $car->fuel_consumption,
                'price' => $car->price,
                'status' => $car->status,
            ];
        });

        return response()->json($cars);
    }

    public function show($id)
    {
        $car = Cars::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json([
            'id' => $car->id,
            'category' => $car->category,
            'brand' => $car->brand,
            'model' => $car->model,
            'image_url' => $car->image_url ? url('storage/' . $car->image_url) : null,
            'capacity' => $car->capacity,
            'transmission' => $car->transmission,
            'lunggage_capacity' => $car->lunggage_capacity,
            'features' => $car->features,
            'fuel_type' => $car->fuel_type,
            'fuel_consumption' => $car->fuel_consumption,
            'price' => $car->price,
            'status' => $car->status,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:20',
            'brand' => 'required|string|max:20',
            'model' => 'required|string|max:20',
            'image_url' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'capacity' => 'required|string|max:20',
            'transmission' => 'required|string|max:20',
            'lunggage_capacity' => 'required|string|max:50',
            'features' => 'required|array',
            'fuel_type' => 'required|string|max:20',
            'fuel_consumption' => 'required|string|max:20',
            'price' => 'required|integer',
            'status' => 'required|string|max:20',
        ]);

        $imagePath = $request->file('image_url')->store('cars', 'public');

        $car = Cars::create([
            'category' => $request->category,
            'brand' => $request->brand,
            'model' => $request->model,
            'image_url' => $imagePath,
            'capacity' => $request->capacity,
            'transmission' => $request->transmission,
            'lunggage_capacity' => $request->lunggage_capacity,
            'features' => json_encode($request->features),
            'fuel_type' => $request->fuel_type,
            'fuel_consumption' => $request->fuel_consumption,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return response()->json($car, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:20',
            'brand' => 'required|string|max:20',
            'model' => 'required|string|max:20',
            'image_url' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'capacity' => 'required|string|max:20',
            'transmission' => 'required|string|max:20',
            'lunggage_capacity' => 'required|string|max:50',
            'features' => 'required|array',
            'fuel_type' => 'required|string|max:20',
            'fuel_consumption' => 'required|string|max:20',
            'price' => 'required|integer',
            'status' => 'required|string|max:20',
        ]);

        $car = Cars::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        if ($request->hasFile('image_url')) {
            Storage::delete('public/' . $car->image_url);
            $imagePath = $request->file('image_url')->store('cars', 'public');
            $car->image_url = $imagePath;
        }

        $car->update([
            'category' => $request->category,
            'brand' => $request->brand,
            'model' => $request->model,
            'capacity' => $request->capacity,
            'transmission' => $request->transmission,
            'lunggage_capacity' => $request->lunggage_capacity,
            'features' => json_encode($request->features),
            'fuel_type' => $request->fuel_type,
            'fuel_consumption' => $request->fuel_consumption,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return response()->json($car);
    }

    public function destroy($id)
    {
        $car = Cars::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        Storage::delete('public/' . $car->image_url);
        $car->delete();

        return response()->json(['message' => 'Car deleted successfully']);
    }
}
