<?php

namespace App\Http\Controllers;

use App\Models\FamilyCar;
use Illuminate\Http\Request;

class FamilyCarsController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'merk' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'icon_path' => 'required|string',
        'image_path' => 'required|string',
        'seat' => 'required|integer',
        'transmisi' => 'required|string',
        'harga' => 'required|integer',
    ]);

    $familyCar = FamilyCar::create([
        'merk' => $request->merk,
        'model' => $request->model,
        'icon_path' => $request->icon_path,
        'image_path' => $request->image_path,
        'seat' => $request->seat,
        'transmisi' => $request->transmisi,
        'harga' => $request->harga,
    ]);

    return response()->json($familyCar, 201);
}

}
