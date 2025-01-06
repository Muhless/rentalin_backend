<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Menampilkan daftar fitur mobil
     */
    public function index()
    {
        $features = Feature::all();  // Mengambil semua data fitur
        return response()->json($features);
    }

    /**
     * Menampilkan satu fitur berdasarkan ID
     */
    public function show($id)
    {
        $feature = Feature::find($id);

        if (!$feature) {
            return response()->json(['message' => 'Feature not found'], 404);
        }

        return response()->json($feature);
    }

    /**
     * Menambah fitur baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'capacity' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'luggage_capacity' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'fuel_consumption' => 'required|string|max:255',
        ]);

        $feature = Feature::create($request->all());

        return response()->json($feature, 201);  // Mengembalikan data fitur yang baru ditambahkan
    }

    /**
     * Mengupdate fitur berdasarkan ID
     */
    public function update(Request $request, $id)
    {
        $feature = Feature::find($id);

        if (!$feature) {
            return response()->json(['message' => 'Feature not found'], 404);
        }

        $request->validate([
            'capacity' => 'required|string|max:255',
            'transmission' => 'required|string|max:255',
            'luggage_capacity' => 'required|string|max:255',
            'fuel_type' => 'required|string|max:255',
            'fuel_consumption' => 'required|string|max:255',
        ]);

        $feature->update($request->all());

        return response()->json($feature);  // Mengembalikan data fitur yang sudah diupdate
    }

    /**
     * Menghapus fitur berdasarkan ID
     */
    public function destroy($id)
    {
        $feature = Feature::find($id);

        if (!$feature) {
            return response()->json(['message' => 'Feature not found'], 404);
        }

        $feature->delete();

        return response()->json(['message' => 'Feature deleted successfully']);
    }
}
