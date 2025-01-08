@extends('layouts.app')
@section('title', 'Daftar Pengguna')

@section('content')
    <div class="content p-6 bg-white">
        <h1 class="text-3xl font-bold mb-4">Daftar Pengguna</h1>

        <div class="overflow-x-auto shadow-md rounded-lg border border-gray-200 mt-6">
            <table class="min-w-full table-auto text-left">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-4 text-center">ID</th>
                        <th class="py-3 px-4 text-center">Username</th>
                        <th class="py-3 px-4 text-center">No Telepon</th>
                        <th class="py-3 px-4 text-center">Tanggal Pembuatan</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-t text-sm">
                            <td class="py-3 px-4 text-center">{{ $user->id }}</td>
                            <td class="py-3 px-4">{{ $user->username }}</td>
                            <td class="py-3 px-4 text-center">{{ $user->phone }}</td>
                            <td class="py-3 px-4 text-center">{{ $user->created_at->isoformat('DD MMMM Y') }}</td>
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('users.edit', $user) }}"
                                    class="text-blue-600 hover:text-blue-800 mr-3">Ubah</a>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 focus:outline-none">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
