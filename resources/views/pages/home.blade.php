    @extends('layouts.app')
    @section('title', 'Homepage')

    @section('content')
        <div class="content">
            <h1>Welcome, {{ auth()->user()->username }}</h1>
            <p>
                You are successfully logged in! This is your dashboard, where you can manage your account and access
                other features.
            </p>
            <div class="actions">
                <a href="rents">Rental</a>
                <a href="/cars">Mobil</a>
                <a href="#">Akun</a>
            </div>
        </div>
    @endsection
