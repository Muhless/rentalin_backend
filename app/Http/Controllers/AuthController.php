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
        // Validasi input
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email|string|unique:users',
            'password' => 'required|string|min:6'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            // Membuat user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            // Membuat token untuk user
            $token = $user->createToken('personal access token')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response()->json($response, 201);
        } catch (Exception $e) {
            // Menangani error
            return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
        }
    }

    public function login(Request $request)
    {
        // Validasi input login
        $rules = [
            'email' => 'required|email',
            'password' => 'required|string'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            // Cari user berdasarkan email
            $user = User::where('email', $request->email)->first();

            if ($user && Hash::check($request->password, $user->password)) {
                // Membuat token jika login berhasil
                $token = $user->createToken('personal access token')->plainTextToken;

                $response = [
                    'user' => $user,
                    'token' => $token
                ];

                return response()->json($response, 200);
            } else {
                // Jika email atau password salah
                return response()->json(['message' => 'Invalid email or password'], 400);
            }
        } catch (Exception $e) {
            // Menangani error
            return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
        }
    }
}
