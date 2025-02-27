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
                Halaman Awal
            </a>
        </li>
        </li>
            <li class="mb-3">
            <a href="/users"
                class="block text-black text-base p-2 rounded hover:bg-blue-600 hover:text-white transition">
                Akun
            </a>
        </li>
        <li class="mb-3">
            <a href="/cars"
                class="block text-black text-base p-2 rounded hover:bg-blue-600 hover:text-white transition">
                Mobil
            </a>
        </li>
        <li class="mb-3">
            <a href="/rentals"
                class="block text-black text-base p-2 rounded hover:bg-blue-600 hover:text-white transition">
                Rental
            </a>
        </li>
        <li class="mb-3">
            <a href="/returns"
                class="block text-black text-base p-2 rounded hover:bg-blue-600 hover:text-white transition">
                Pengembalian
            </a>
        <li>
            <form action="/logout" method="POST" class="m-0" onsubmit="return confirmLogout(event)">
                @csrf
                <button type="submit"
                    class="w-full text-left bg-none border-none text-black text-base p-2 rounded hover:bg-red-600 hover:text-white transition">
                    Logout
                </button>
            </form>

            <script>
                function confirmLogout(event) {
                    const confirmed = confirm("Apakah Anda yakin ingin keluar dari akun ini?");
                    if (!confirmed) {
                        event.preventDefault();
                    }
                    return confirmed;
                }
            </script>

        </li>
    </ul>
</div>
