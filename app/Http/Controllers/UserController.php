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

    public function index(Request $request)
    {
        $query = User::orderBy('created_at', 'desc');
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('username', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%');
        }
        $users = $query->get();
        return view('pages.users.index', compact('users'));
    }


    public function edit(User $user)
    {
        return view('pages.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Akun berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Terjadi kesalahan saat menghapus akun.');
        }
    }
}
