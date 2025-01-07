        <!DOCTYPE html>
        <html lang="en">
            @include('layouts.partials.head')

            <body class="flex overflow-auto bg-white">
                @include('layouts.partials.sidebar')
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
