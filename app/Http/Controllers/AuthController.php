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
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    function register(Request $request)
    {
        try {
            $cred = new User();
            $cred->name = $request->name;
            $cred->email = $request->email;
            $cred->password = Hash::make($request->password);
            $cred->save();
            $response = ['status' => 200, 'message' => 'User created successfully'];
            return response()->json($response);
        } catch (Exception $e) {
            $response = ['status ' => 500, 'message' => 'User creation failed'];
        }
    }

    function Login(Request $request){
        $user = User::where('email', $request->email)->first();

        if ($user!= '[]' && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('token')->plainTextToken;
            $response = ['status' => 200, 'token' => $token, 'user' => $user, 'message' => 'User logged in successfully'];
            return response()->json($response);
        } else if ($user == '[]') {
            $response = ['status' => 500, 'message' => 'User not found'];
            return response()->json($response);
        } else {
            $response = ['status' => 500, 'message' => 'wrong email or password'];
            return response()->json($response);
        }
    }
}
