<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        $query = Rental::with(['user', 'car'])->orderBy('created_at', 'desc');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('username', 'like', '%' . $search . '%');
            })->orWhereHas('car', function ($q) use ($search) {
                $q->where('brand', 'like', '%' . $search . '%')
                    ->orWhere('model', 'like', '%' . $search . '%');
            })->orWhere('status', 'like', '%' . $search . '%');
        }

        if ($request->has('rent_date') && $request->rent_date != '') {
            $query->whereDate('rent_date', $request->rent_date);
        }
        $query->whereIn('status', ['Menunggu persetujuan', 'Disetujui']);
        $rentals = $query->get();
        return view('pages.rentals.index', compact('rentals'));
    }

    public function show($id)
    {
        $rental = Rental::with(['user', 'car'])->findOrFail($id);
        return view('pages.rentals.detail', compact('rental'));
    }


    public function indexed(Request $request)
    {
        $query = Rental::with(['user', 'car'])->orderBy('created_at', 'desc');
        $query->whereIn('status', ['Selesai', 'Ditolak']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', function ($q) use ($search) {
                    $q->where('username', 'like', '%' . $search . '%');
                })->orWhereHas('car', function ($q) use ($search) {
                    $q->where('brand', 'like', '%' . $search . '%')
                        ->orWhere('model', 'like', '%' . $search . '%');
                })->orWhere('status', 'like', '%' . $search . '%');
            });
        }

        if ($request->has('rent_date') && $request->rent_date != '') {
            $query->whereDate('rent_date', $request->rent_date);
        }
        $query->whereIn('status', ['Selesai', 'Ditolak']);
        $rentals = $query->get();
        return view('pages.returns.index', compact('rentals'));
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

        if ($validated['status'] === 'Disetujui') {
            $car = $rental->car;
            if ($car) {
                $car->update(['status' => 'Tidak Tersedia']);
            }
        }

        return back()->with('success', 'status rental berhasil diubah.');
    }
}
