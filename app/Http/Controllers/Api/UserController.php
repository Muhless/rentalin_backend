<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'username' => 'required|string|max:50|unique:users,username',
            'phone' => 'required|string|max:15|unique:users,phone',
            'password' => 'required|string|min:8',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        try {
            $user = User::create([
                'username' => $request->username,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token,
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Registration failed. Please try again later.'], 500);
        }
    }

    public function login(Request $request)
    {
        $rules = [
            'username' => 'required|string',
            'password' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed. Missing username or password.'], 400);
        }
        $user = User::where('username', $request->username)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid username or password'], 401);
        }
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        return response()->json([
            'message' => 'Login berhasil',
            'user' => $user,
            'token' => $token,
        ], 200);
    }
}
