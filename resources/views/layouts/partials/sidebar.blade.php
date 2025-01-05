<div class="w-52 bg-white text-black h-screen fixed top-0 left-0 p-5">
    <div class="text-center mb-5">
        <a href="/home">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-24 h-auto mx-auto mb-5">
        </a>
    </div>
    <ul class="list-none p-0 m-0">
        <li class="mb-3">
            <a href="/home"
                class="block text-base p-2 rounded transition
                {{ Request::is('home') ? 'bg-blue-600 text-white hover:bg-blue-700' : 'text-black hover:bg-blue-600 hover:text-white' }}">
                Dashboard
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ route('rents') }}"
                class="block text-base p-2 rounded transition
                {{ Request::is('rents*') ? 'bg-blue-600 text-white hover:bg-blue-700' : 'text-black hover:bg-blue-600 hover:text-white' }}">
                Rental
            </a>
        </li>
        <li class="mb-3">
            <a href="{{ route('cars') }}"
                class="block text-base p-2 rounded transition
                {{ Request::is('cars*') ? 'bg-blue-600 text-white hover:bg-blue-700' : 'text-black hover:bg-blue-600 hover:text-white' }}">
                Mobil
            </a>
        </li>
        <li>
            <form action="/logout" method="POST" class="m-0">
                @csrf
                <button type="submit"
                    class="w-full text-left bg-none border-none text-base p-2 rounded transition
                    hover:bg-red-600 hover:text-white text-black">
                    Logout
                </button>
            </form>
        </li>
    </ul>
</div>
