<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['user', 'car'])->orderBy('created_at', 'desc')->get();
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
            'user_id' => 'exists:users,id',
            'car_id' => 'exists:cars,id',
            'rent_date' => 'date',
            'return_date' => 'date',
            'rent_duration' => 'integer',
            'driver' => 'string',
            'total' => 'integer'
        ]);

        $rental = Rental::create($request->all());

        return response()->json($rental, 201);
    }

    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);

        $request->validate([
            'user_id' => 'exists:users,id',
            'car_id' => 'exists:cars,id',
            'rent_date' => 'date',
            'return_date' => 'date',
            'rent_duration' => 'integer',
            'driver' => 'string',
            'total' => 'integer'
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
