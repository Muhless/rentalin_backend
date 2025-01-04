<!DOCTYPE html>
<html lang="en">
    @include('partials.head')

    <body>
        @include('partials.sidebar')
        @include('partials.navbar')
        @yield('content')
    </body>

</html>
