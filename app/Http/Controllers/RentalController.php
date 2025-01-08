<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['user', 'car'])->get();
        $rentals = Rental::orderBy('created_at', 'desc')->get();
        return view('pages.rentals.index', compact('rentals'));
    }

    public function create()
    {
        $users = User::all();
        $cars = Car::where('status', 'Tersedia')->get();
        return view('rentals.create', compact('users', 'cars'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'rent_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rent_date',
            'rent_duration' => 'required|integer|min:1',
            'driver' => 'required|string',
            'total' => 'required|integer|min:0',
            'status' => 'required|string',
        ]);

        Rental::create($validated);

        Car::where('id', $validated['car_id'])->update(['status' => 'Tidak Tersedia']);

        return redirect()->route('rentals.index')->with('success', 'Rental berhasil ditambahkan.');
    }

    public function edit(Rental $rental)
    {
        $users = User::all();
        $cars = Car::all();
        return view('pages.rentals.edit', compact('rental', 'users', 'cars'));
    }

    public function update(Request $request, Rental $rental)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'rent_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:rent_date',
            'rent_duration' => 'required|integer|min:1',
            'driver' => 'required|string',
            'total' => 'required|integer|min:0',
            'status' => 'required|string',
        ]);

        $rental->update($validated);

        return redirect()->route('rentals.index')->with('success', 'Rental berhasil diperbarui.');
    }

    public function destroy(Rental $rental)
    {
        if ($rental->car) {
            $rental->car->update(['status' => 'Tersedia']);
        } else {
            return back()->with('error', 'Mobil tidak ditemukan.');
        }
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Data Rental berhasil dihapus.');
    }

    public function updateStatus(Request $request, Rental $rental)
    {
        $validated = $request->validate([
            'status' => 'required|string|in:Belum Disetujui,Disetujui,Ditolak',
        ]);
        $rental->update([
            'status' => $validated['status'],
        ]);

        return back()->with('success', 'status rental berhasil diubah.');
    }
}
