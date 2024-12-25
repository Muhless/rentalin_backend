<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        // validasi
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users',
            'password' => 'required|string|min:6'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken('personal access token')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];
        return response()->json($response, 201);
    }

    function Login(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
        $request->validate($rules);
        $user = User::where('email', $request->email)->first();
        if ($user && hash::check($request->password, $user->password)) {
            $token = $user->createToken('personal access token')->plainTextToken;
            $response = ['user' => $user, 'token' => $token];
            return response()->json($response, 200);
        }
        $response = ['message' => 'Invalid email or password'];
        return response()->json($response, 400);
    }
}
