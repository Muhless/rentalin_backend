<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function getCarsByCategory(Request $request)
    {
        $category = $request->query('category');
        $cars = Cars::where('category', $category)->get();
        return response()->json($cars);
    }

    public function index()
    {
        $cars = Cars::all();
        return view('pages.cars.index', compact('cars'));
    }

    public function show($id)
    {
        $car = Cars::find($id);

        if (!$car) {
            return response()->json(['message' => 'Car not found'], 404);
        }

        return response()->json($car);
    }

   // In CarController.php
public function store(Request $request)
{
    $request->validate([
        'category' => 'required|string|max:20',
        'brand' => 'required|string|max:20',
        'model' => 'required|string|max:20',
        'image_url' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        'price' => 'required|integer',
        'status' => 'required|string|max:20',
    ]);

    // Handle the image upload
    $imagePath = $request->file('image_url')->store('cars', 'public');

    // Create the new car
    Cars::create([
        'category' => $request->category,
        'brand' => $request->brand,
        'model' => $request->model,
        'image_url' => $imagePath,
        'price' => $request->price,
        'status' => $request->status,
    ]);

    return redirect()->route('cars.index')->with('success', 'Mobil baru berhasil ditambahkan.');
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
            return redirect()->route('cars.index')->with('error', 'Mobil tidak ditemukan.');
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

        return redirect()->route('cars.index')->with('success', 'Data mobil berhasil diperbarui.');
    }

    public function delete($id)
    {
        $car = Cars::find($id);

        if (!$car) {
            return redirect()->route('cars.index')->with('error', 'Mobil tidak ditemukan.');
        }

        Storage::delete('public/' . $car->image_url);
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Data mobil berhasil dihapus.');
    }

    public function create()
    {
        return view('pages.cars.create');
    }

    public function edit($id)
    {
        $car = Cars::findOrFail($id);
        return view('pages.cars.edit', compact('car'));
    }
}
