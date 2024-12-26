<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    public function index()
    {
        return response()->json(Cars::all());
    }

    public function show($id)
    {
        $car = Cars::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }
        return response()->json($car);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:20',
            'brand' => 'required|string|max:20',
            'model' => 'required|string|max:20',
            'icon_path' => 'required|image|mimes:png,jpg',
            'image_path' => 'required|image|mimes:png,jpg',
            'capacity' => 'required|string|max:20',
            'transmission' => 'required|string|max:20',
            'price' => 'required|integer',
            'status' => 'required|string|max:20',
        ]);

        $iconPath = $request->file('icon_path')->store('icons', 'public');
        $imagePath = $request->file('image_path')->store('images', 'public');

        $car = Cars::create([
            'category' => $request->category,
            'brand' => $request->brand,
            'model' => $request->model,
            'icon_path' => $iconPath,
            'image_path' => $imagePath,
            'capacity' => $request->capacity,
            'transmission' => $request->transmission,
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
            'icon_path' => 'nullable|image|mimes:png,jpg',
            'image_path' => 'nullable|image|mimes:png,jpg',
            'capacity' => 'required|string|max:20',
            'transmission' => 'required|string|max:20',
            'price' => 'required|integer',
            'status' => 'required|string|max:20',
        ]);

        $car = Cars::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        if ($request->hasFile('icon_path')) {
            Storage::delete('public/' . $car->icon_path);
            $iconPath = $request->file('icon_path')->store('icons', 'public');
            $car->icon_path = $iconPath;
        }

        if ($request->hasFile('image_path')) {
            Storage::delete('public/' . $car->image_path);
            $imagePath = $request->file('image_path')->store('images', 'public');
            $car->image_path = $imagePath;
        }

        $car->update([
            'category' => $request->category,
            'brand' => $request->brand,
            'model' => $request->model,
            'capacity' => $request->capacity,
            'transmission' => $request->transmission,
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

        Storage::delete('public/' . $car->icon_path);
        Storage::delete('public/' . $car->image_path);

        $car->delete();
        return response()->json(['message' => 'Car deleted successfully']);
    }
}
