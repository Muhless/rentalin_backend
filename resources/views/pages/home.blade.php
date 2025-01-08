@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
    <div class="content max-w-7xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-semibold mb-4">Selamat Datang, {{ auth()->user()->username }}!</h1>
        <p class="text-lg text-gray-700 mb-8">
            Anda berhasil masuk! Ini adalah dashboard Anda, tempat untuk mengelola akun, mengakses fitur-fitur penting,
            dan memantau aktivitas Anda.
        </p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <h3 class="text-2xl font-semibold mb-4">Rental</h3>
                <p class="text-gray-600 mb-4">Kelola pemesanan dan transaksi rental.</p>
                <a href="/rents"
                    class="inline-block bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                    Kelola Rental
                </a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <h3 class="text-2xl font-semibold mb-4">Mobil</h3>
                <p class="text-gray-600 mb-4">Kelola daftar mobil, harga, dan ketersediaan.</p>
                <a href="/cars"
                    class="inline-block bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                   Kelola Mobil
                </a>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                <h3 class="text-2xl font-semibold mb-4">Akun</h3>
                <p class="text-gray-600 mb-4">Kelola data user dan customer.</p>
                <a href="#"
                    class="inline-block bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                    Kelola Akun
                </a>
            </div>
        </div>
    </div>
@endsection
