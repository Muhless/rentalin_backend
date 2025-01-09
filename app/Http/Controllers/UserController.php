<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $rules = [
            'username' => 'required|string',
            'password' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->username !== 'admin') {
            return redirect('/login')->withErrors([
                'login' => 'Hanya akun admin yang dapat login.',
            ]);
        }

        $user = User::where('username', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return redirect('/login')->withErrors([
                'login' => 'username atau password salah',
            ]);
        }
        auth()->login($user);
        return redirect('/home');
    }

    public function index()
{
    $users = User::orderBy('created_at', 'desc')->get(); 
    return view('pages.users.index', compact('users'));
}



    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
