        <!DOCTYPE html>
        <html lang="en">
            @include('layouts.partials.head')

            <body class="flex">
                <div class="w-52 bg-white text-black h-screen fixed top-0 left-0 p-5">
                    <div class="text-center mb-5">
                        <a href="/home">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-24 h-auto mx-auto mb-5">
                        </a>
                    </div>

                    <ul class="list-none p-0 m-0">
                        <li class="mb-3">
                            <a href="/home"
                                class="block text-black text-base p-2 rounded hover:bg-blue-600 hover:text-white transition">
                                Dashboard
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ route('rents') }}"
                                class="block text-black text-base p-2 rounded hover:bg-blue-600 hover:text-white transition">
                                Rental
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ route('cars') }}"
                                class="block text-black text-base p-2 rounded hover:bg-blue-600 hover:text-white transition">
                                Mobil
                            </a>
                        </li>
                        <li>
                            <form action="/logout" method="POST" class="m-0">
                                @csrf
                                <button type="submit"
                                    class="w-full text-left bg-none border-none text-black text-base p-2 rounded hover:bg-red-600 hover:text-white transition">
                                    Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="ml-52 flex-1 bg-gray-100 min-h-screen">
                    <div class="sticky top-0 z-10 bg-white shadow">
                        @include('layouts.partials.navbar')
                    </div>
                    <div class="p-5">
                        @yield('content')
                    </div>
                </div>

            </body>

        </html>
