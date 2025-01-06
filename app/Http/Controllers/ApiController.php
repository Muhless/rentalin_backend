<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;

class ApiController extends Controller
{
    public function getUsers()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function getCars()
    {
        $data = Car::all();
        return response()->json($data);
    }
}
