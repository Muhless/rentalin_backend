<div class="bg-blue-500 text-white p-4 flex justify-end items-center">
    <form action="/logout" method="POST" class="m-0">
        @csrf
        <button type="submit"
                class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded text-sm">
            Logout
        </button>
    </form>
</div>
