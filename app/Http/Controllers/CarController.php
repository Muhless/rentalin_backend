<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $cars = Car::where('brand', 'like', '%' . $search . '%')
                ->orWhere('model', 'like', '%' . $search . '%')
                ->orWhere('category', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->get();
        } else {
            $cars = Car::all();
        }
        return view('pages.cars.index', compact('cars'));
    }

    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view('pages.cars.detail', compact('car'));
    }


    public function create()
    {
        return view('pages.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:50',
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
            'price' => 'required|numeric',
            // 'status' => 'required|string|max:50',
            'capacity' => 'nullable|string|max:50',
            'transmission' => 'nullable|string|max:50',
            'luggage_capacity' => 'nullable|string|max:50',
            'fuel_type' => 'nullable|string|max:50',
            'fuel_consumption' => 'nullable|string|max:50',
        ]);

        $imagePath = null;
        if ($request->hasFile('image_url')) {
            $path = $request->file('image_url')->store('images', 'public');
            $imagePath = asset('storage/' . $path);
        }

        Car::create([
            'category' => $request->category,
            'brand' => $request->brand,
            'model' => $request->model,
            'image_url' => $imagePath,
            'price' => $request->price,
            // 'status' => $request->status,
            'capacity' => $request->capacity,
            'transmission' => $request->transmission,
            'luggage_capacity' => $request->luggage_capacity,
            'fuel_type' => $request->fuel_type,
            'fuel_consumption' => $request->fuel_consumption,
        ]);

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('pages.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:50',
            'brand' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'image_url' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
            'price' => 'required|numeric',
            'status' => 'required|string|max:50',
            'capacity' => 'nullable|string|max:50',
            'transmission' => 'nullable|string|max:50',
            'luggage_capacity' => 'nullable|string|max:50',
            'fuel_type' => 'nullable|string|max:50',
            'fuel_consumption' => 'nullable|string|max:50',
        ]);

        $car = Car::findOrFail($id);

        if ($request->hasFile('image_url')) {
            if ($car->image_url) {
                $oldImagePath = str_replace(asset('storage/'), '', $car->image_url);
                if (Storage::exists('public/' . $oldImagePath)) {
                    Storage::delete('public/' . $oldImagePath);
                }
            }

            $path = $request->file('image_url')->store('images', 'public');
            $car->image_url = asset('storage/' . $path);
        }

        $car->update([
            'category' => $request->category,
            'brand' => $request->brand,
            'model' => $request->model,
            'image_url' => $car->image_url,
            'price' => $request->price,
            'status' => $request->status,
            'capacity' => $request->capacity,
            'transmission' => $request->transmission,
            'luggage_capacity' => $request->luggage_capacity,
            'fuel_type' => $request->fuel_type,
            'fuel_consumption' => $request->fuel_consumption,
        ]);

        return redirect()->route('cars.show', ['id' => $car->id])->with('success', 'Mobil berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        if ($car->image_url && Storage::exists('public/' . $car->image_url)) {
            Storage::delete('public/' . $car->image_url);
        }

        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Mobil berhasil dihapus!');
    }
}
