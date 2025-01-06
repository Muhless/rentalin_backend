<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    // Display all rentals
    public function index()
    {
        $rentals = Rental::with(['user', 'car'])->get();  // Eager load relationships
        return response()->json($rentals);
    }

    // Show a single rental record
    public function show($id)
    {
        $rental = Rental::with(['user', 'car'])->findOrFail($id);  // Find rental by ID and load relationships
        return response()->json($rental);
    }

    // Store a new rental record
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'rent_date' => 'required|date',
            'return_date' => 'required|date',
            'rent_duration' => 'required|integer',
            'payment' => 'required|string',
            'total' => 'required|integer'
        ]);

        // Create a new rental record
        $rental = Rental::create($request->all());

        return response()->json($rental, 201);  // Return the newly created rental
    }

    // Update an existing rental record
    public function update(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);

        // Validate incoming data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'rent_date' => 'required|date',
            'return_date' => 'required|date',
            'rent_duration' => 'required|integer',
            'payment' => 'required|string',
            'total' => 'required|integer'
        ]);

        // Update rental record
        $rental->update($request->all());

        return response()->json($rental);  // Return the updated rental
    }

    // Delete a rental record
    public function destroy($id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();

        return response()->json(['message' => 'Rental deleted successfully']);
    }
}
