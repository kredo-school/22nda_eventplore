<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- garamond400 and raleway --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white navbar-top-bottom-border navbar-fixed-height" style="font-family: 'EB Garamond', serif;">
            <div class="container-fluid">
                {{-- Logo --}}
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="Logo" style="width: 64px; height: auto;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Center Of Navbar -->
                    {{-- only guests and users --}}
                    <form class="d-flex mx-auto">
                        <select class="form-select me-2">
                            <option selected>Search by Area</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                        <input type="date" class="form-control" placeholder="Calendar">
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        {{-- @guest --}}
                            {{-- Sign in --}}
                            {{-- @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-green" href="#">{{ __('SIGN-IN') }}</a>
                            </li>
                            @endif --}}

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}

                        {{-- @else --}}
                            {{-- for users --}}
                            {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-circle-user fa-2xl"></i>
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-circle-user fa-xl"></i>&nbsp; Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-clipboard-list fa-xl"></i>&nbsp; My Event
                                    </a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 fa-xl"></i>
                                        &nbsp; {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li> --}}

                            {{-- for event ownwers --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="d-flex align-items-center justify-content-center">
                                        <i class="fa-solid fa-circle-user fa-2xl" style="color: #0C2C04"></i>
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-circle-user fa-xl"></i>&nbsp; Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-clipboard-list fa-xl"></i>&nbsp; Event Lists
                                    </a>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        {{-- @endguest --}}
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="d-flex">
                            <a href="#" class="me-3 text-secondary text-decoration-none">
                                <i class="fab fa-facebook fa-xl"></i>
                            </a>
                            <a href="#" class="me-3 text-secondary text-decoration-none fa-xl">
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>
                            <a href="#" class="me-3 text-secondary text-decoration-none fa-xl">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4 text-center" style="color: #84947C">
                        <small>Copylight 2024 Eventplore</small>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="#" class="me-3 text-decoration-none" style="color: #84947C">Terms of service</a>
                        <a href="#" class=" text-decoration-none" style="color: #84947C">Support</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>
