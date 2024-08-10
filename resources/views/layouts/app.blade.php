<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
            @yield('title') | {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Fabicon -->
    <link rel="icon" href="{{ asset('images/eventplore-logo_final-nobg_480.png') }}">

    {{-- garamond400 and raleway --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Mapbox --}}
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.js"></script>
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v3.3.0/mapbox-gl.css" rel="stylesheet" />

    {{-- ajax --}}
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    {{-- ApexCharts --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sign-inup/sign-inup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
    <div id="app" class="d-flex flex-column">

        @if (!in_array(Route::currentRouteName(), ['user.sign-in', 'user.sign-up', 'event-owner.sign-in', 'event-owner.sign-up','password.request','password.reset']))
            @include('partials.navbar')
        @endif

        <main>
            @yield('content')
        </main>

        {{-- footer --}}
        @if (!in_array(Route::currentRouteName(), ['home', 'event-menu', 'user.sign-in', 'user.sign-up', 'event-owner.sign-in', 'event-owner.sign-up','password.request','password.reset', 'category.search']))
            @include('partials.footer')
        @endif

    </div>

</body>
</html>
