@extends('layouts.app')
@section('title', 'Halaman Rental')

@section('content')
    <div class="content">
        <h1>Daftar Transaksi Rental</h1>
        <p>Berikut adalah daftar transaksi rental yang telah dilakukan:</p>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pemesan</th>
                    <th>Mobil</th>
                    <th>Tanggal Sewa</th>
                    <th>Tanggal Kembali</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Avanza</td>
                    <td>2025-01-01</td>
                    <td>2025-01-05</td>
                    <td>Rp. 500,000</td>
                    <td>Selesai</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>Innova</td>
                    <td>2025-01-02</td>
                    <td>2025-01-06</td>
                    <td>Rp. 600,000</td>
                    <td>Menunggu Pengembalian</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
