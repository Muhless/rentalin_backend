<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'username' => 'required|string|max:50',
            'email' => 'required|email|string|unique:users',
            'phone' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $user = User::create([
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('personal access token')->plainTextToken;

            $response = [
                'user' => $user,
                'token' => $token
            ];

            return response()->json($response, 201);
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
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
            return response()->json($validator->errors(), 400);
        }

        try {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('personal access token')->plainTextToken;

                $response = [
                    'user' => $user,
                    'token' => $token
                ];

                return response()->json($response, 200);
            } else {
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Something went wrong. Please try again later.'], 500);
        }
    }
}
