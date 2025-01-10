@extends('layouts.app')
@section('title', 'Daftar Pengguna')

@section('content')
    <div class="content p-6 bg-white">
        <h1 class="text-3xl font-bold mb-4">Daftar Pengguna</h1>
        <form action="{{ route('users.index') }}" method="GET" class="mb-5">
            <div class="flex items-center space-x-4">
                <input type="text" name="search" value="{{ request()->query('search') }}" placeholder="Cari user"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                @if (request()->query('search'))
                    <a href="{{ route('users.index') }}"
                        class="bg-red-600 text-white py-2 px-6 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                        Hapus
                    </a>
                @endif
                <button type="submit"
                    class="bg-blue-600 text-white py-2 px-6 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Cari
                </button>
            </div>
        </form>
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
                                <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $user->id }})"
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data ini akan dihapus secara permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${userId}`).submit();
            }
        });
    }
</script>
