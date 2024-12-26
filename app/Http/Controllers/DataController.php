<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        $posts = User::all();

        return response()->json($posts);
    }
}
