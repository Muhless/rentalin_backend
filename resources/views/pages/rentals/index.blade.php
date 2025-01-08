@extends('layouts.app')

@section('title', 'Daftar Rental')

@section('content')
    <div class="p-6 bg-white">
        <h1 class="text-3xl font-bold mb-4">Daftar Rental</h1>
        <table class="min-w-full shadow-md bg-white border border-gray-200 rounded-lg overflow-hidden mt-6">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="py-3 px-5 border text-center">No</th>
                    <th class="py-3 px-5 border text-center">Customer</th>
                    <th class="py-3 px-5 border text-center">Mobil</th>
                    <th class="py-3 px-5 border text-center">Tanggal Sewa</th>
                    <th class="py-3 px-5 border text-center">Tanggal Pengembalian</th>
                    <th class="py-3 px-5 border text-center">Durasi</th>
                    <th class="py-3 px-5 border text-center">Driver</th>
                    <th class="py-3 px-5 border text-center">Total</th>
                    <th class="py-3 px-5 border text-center">Keterangan</th>
                    {{-- <th class="py-3 px-5 border text-center">Aksi</th> --}}
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @forelse ($rentals as $rental)
                    <tr class="border-b border-gray-200 text-sm">
                        <td class="py-1 px-5 border text-center">{{ $loop->iteration }}</td>
                        <td class="py-1 px-5 border">{{ $rental->user->username }}</td>
                        <td class="py-1 px-5 border text-center">{{ $rental->car->brand }} {{ $rental->car->model }}</td>
                        <td class="py-1 px-5 border text-center">{{ $rental->rent_date?->isoFormat('DD MMMM Y') }}</td>
                        <td class="py-1 px-5 border text-center">{{ $rental->return_date?->isoFormat('DD MMMM Y') }}</td>
                        <td class="py-1 px-5 border text-center">{{ $rental->rent_duration }} hari</td>
                        <td class="py-1 px-5 border text-center">{{ $rental->driver }}</td>
                        <td class="py-1 px-5 border text-center">Rp. {{ number_format($rental->total, 0, ',', '.') }}</td>
                        <td
                            class="py-1 text-center
                            @if ($rental->status === 'Belum Disetujui') bg-blue-200
                            @elseif ($rental->status === 'Disetujui') bg-green-200
                            @elseif ($rental->status === 'Ditolak') bg-red-200 @endif text-black">
                            <form action="{{ route('rentals.updateStatus', $rental->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if ($rental->status === 'Disetujui' || $rental->status === 'Ditolak')
                                    <input type="text" value="{{ $rental->status }}"
                                        class="mx-4 py-2 rounded-lg border border-gray-300 text-black text-center" readonly>
                                @else
                                    <select name="status"
                                        class="px-4 py-2 rounded-lg border border-gray-300 text-black bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                        onchange="this.form.submit()">
                                        <option value="Belum Disetujui"
                                            {{ $rental->status == 'Belum Disetujui' ? 'selected' : '' }}>
                                            Belum Disetujui
                                        </option>
                                        <option value="Disetujui" {{ $rental->status == 'Disetujui' ? 'selected' : '' }}>
                                            Disetujui
                                        </option>
                                        <option value="Ditolak" {{ $rental->status == 'Ditolak' ? 'selected' : '' }}>
                                            Ditolak
                                        </option>
                                    </select>
                                @endif
                            </form>
                        </td>


                        {{-- <td class="py-3 px-5 text-center">
                            <a href="{{ route('rentals.edit', $rental->id) }}"
                                class="text-blue-600 hover:underline">Ubah</a>
                            |
                            <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline"
                                    onclick="return confirm('Hapus rental ini?')">Hapus</button>
                            </form>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="py-6 text-center text-gray-500">Belum ada data rental.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
