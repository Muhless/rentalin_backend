<?php

namespace App\Http\Controllers;

use App\Models\FamilyCar;
use Illuminate\Http\Request;
use App\Models\User;
use Database\Seeders\familyCarsSeeder;

class ApiController extends Controller
{
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function getFamilyCars()
    {
        $data = FamilyCar::all();
        return response()->json($data);
    }
}
