<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['user', 'car'])->get();
        return response()->json($rentals);
    }

    public function show($id)
    {
        $rental = Rental::with(['user', 'car'])->findOrFail($id);
        return response()->json($rental);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'rent_date' => 'required|date',
            'return_date' => 'required|date',
            'rent_duration' => 'required|integer',
            'driver' => 'required|string',
            'total' => 'required|integer'
        ]);

        $rental = Rental::create($request->all());

        return response()->json($rental, 201);
    }

    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'rent_date' => 'required|date',
            'return_date' => 'required|date',
            'rent_duration' => 'required|integer',
            'driver' => 'required|string',
            'total' => 'required|integer'
        ]);

        $rental->update($request->all());

        return response()->json($rental);
    }

    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();

        return response()->json(['message' => 'Rental deleted successfully']);
    }
}
