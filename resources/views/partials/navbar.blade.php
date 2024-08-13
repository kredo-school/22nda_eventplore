<div class="sticky-top">
    <nav class="navbar navbar-expand-md navbar-light bg-white navbar-top-bottom-border navbar-fixed-height p-0" style="font-family: 'EB Garamond', serif;">
        <div class="container-fluid" style="background-color: {{ Auth::guard('event_owner')->user() ? '#F6E7D2' : '#FFFFFF' }};">
            {{-- Logo --}}
            {{-- <div class="row"> --}}
                <div class="col-md-2 d-flex align-items-center">
                    @auth('event_owner')
                        <a class="navbar-brand" href="{{ route('event-list.show') }}">
                            <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="Logo" style="width: 64px; height: auto;">
                        </a>
                    @else
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="Logo" style="width: 64px; height: auto;">
                        </a>
                    @endauth
                </div>

                <!-- Desktop Menu -->
                <div class="col-md-8">
                    @if ((!Auth::check() || Auth::user()->role == 'user') && !request()->is('/'))
                        <div class="d-none d-md-flex justify-content-center flex-grow-1">
                            <form action="{{ route('events.search') }}" method="GET" class="d-flex w-75">
                                <select class="form-select me-2" id="area" name="area">
                                    <option value="" hidden selected>Search by Area</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                                <input type="date" id="date" name="date" class="form-control me-2" placeholder="Calendar">
                                <button type="submit" class="btn btn-search-icon d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-magnifying-glass fa-xl"></i>
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                    <!-- User & Owner Icon  -->
                <div class="col-md-2 d-flex justify-content-end">
                    @auth('web')
                        <a id="navbarDropdownUser" class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-circle avatar-md">
                            @else
                                <span class="d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-circle-user fa-2xl me-2"></i>
                                </span>
                            @endif
                        </a>
                        {{-- droplist for user --}}
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownUser">
                            <a class="dropdown-item" href="{{ route('users.profile.show') }}">
                                <i class="fa-solid fa-circle-user fa-xl"></i>&nbsp; Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('user.reservation.show') }}">
                                <i class="fa-solid fa-clipboard-list fa-xl"></i>&nbsp; My Events
                            </a>
                            <a class="dropdown-item" href="{{ route('user.bookmark.show') }}">
                                <i class="fa-regular fa-bookmark fa-xl"></i>&nbsp; My Wishlist
                            </a>
                            <hr>
                            <a class="dropdown-item" href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 fa-xl"></i>&nbsp; Logout
                            </a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    @elseauth('event_owner')
                        <a id="navbarDropdownOwner" class="nav-link d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Auth::guard('event_owner')->user()->avatar)
                                <img src="{{ Auth::guard('event_owner')->user()->avatar }}" alt="" class="rounded-circle avatar-md">
                            @else
                                <span class="d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-circle-user fa-2xl me-2" style="color: #0C2C04"></i>
                                </span>
                            @endif
                        </a>
                        {{-- droplist for event owner --}}
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownOwner">
                            <a class="dropdown-item" href="{{ route('event-owners.profile.show') }}">
                                <i class="fa-solid fa-circle-user fa-xl"></i>&nbsp; Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('event-list.show') }}">
                                <i class="fa-solid fa-clipboard-list fa-xl"></i>&nbsp; Event List
                            </a>
                            <hr>
                            <a class="dropdown-item" href="{{ route('event-owner.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-owner').submit();">
                                <i class="fa-solid fa-arrow-right-from-bracket fa-rotate-180 fa-xl"></i>&nbsp; Logout
                            </a>
                            <form id="logout-form-owner" action="{{ route('event-owner.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    @else
                        <div class="d-flex align-items-center ms-auto">
                            @if (Route::has('user.register'))
                                <a class="btn btn-green" href="{{ route('user.sign-in') }}" style="width: 100px">{{ __('SIGN-IN') }}</a>
                            @endif
                        </div>

                    @endauth
                    {{-- @unless(Auth::guard('event_owner')->check())
                        <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHamburger" aria-controls="navbarHamburger" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    @endunless --}}
                    @if (!Auth::guard('event_owner')->check() && Route::currentRouteName() != 'home')
                        <button class="navbar-toggler ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHamburger" aria-controls="navbarHamburger" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    @endif
                </div>
            {{-- </div> --}}

                <!-- Hamburger Menu for smaller screens -->
            @if(!Auth::guard('event_owner')->check())
                <div class="col navbar-collapse" id="navbarHamburger">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0 d-md-none pt-2" style="background-color: white;">
                        @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-green mx-3" href="{{ route('user.sign-in') }}">{{ __('SIGN-IN') }}</a>
                            </li>
                            @endif
                        @else
                        @endguest
                        <!-- Dropdown 2: Area and Calendar Search -->
                        <li class="nav-item px-3">
                            <form action="{{ route('events.search') }}" method="GET" class="d-flex flex-column">
                                <select class="form-select my-2" id="area" name="area">
                                    <option value="" hidden selected>Search by Area</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                                <input type="date" id="date" name="date" class="form-control mb-2" placeholder="Calendar">
                                <button type="submit" class="btn btn-yellow align-self-end"><span>SEARCH</span> <i class="fa-solid fa-magnifying-glass fa-xl"></i></button>
                            </form>
                        </li>

                        <!-- Dropdown 3: Category Search with scroll -->
                        <li class="nav-item">
                            <ul class="nav-list" style="max-height: 200px; overflow-y: auto;">
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'culture']) }}"><i class="fa-solid fa-torii-gate"></i> Culture</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'fireworks']) }}"><i class="fa-brands fa-first-order-alt"></i> Fireworks</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'festival']) }}"><i class="fas fa-theater-masks"></i> Festival</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'food/drink']) }}"><i class="fa-solid fa-utensils"></i> Food/Drink</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'sport']) }}"><i class="fa-solid fa-baseball-bat-ball"></i> Sport</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'art']) }}"><i class="fa-solid fa-paint-brush"></i> Art</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'music']) }}"><i class="fa-solid fa-music"></i> Music</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'nature']) }}"><i class="fa-solid fa-leaf"></i> Nature</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'illumination']) }}"><i class="fa-regular fa-lightbulb"></i> Illumination</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'movie']) }}"><i class="fa-solid fa-film"></i> Movie</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'hobby']) }}"><i class="fa-solid fa-icons"></i> Hobby</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'business']) }}"><i class="fa-solid fa-user-tie"></i> Business</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'online']) }}"><i class="fa-solid fa-house-laptop"></i> Online</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'free']) }}"><i class="fas fa-hand-holding-usd"></i> Free</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'parking']) }}"><i class="fa-brands fa-product-hunt"></i> Parking</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'toilet']) }}"><i class="fa-solid fa-restroom"></i> Toilet</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'train/bus']) }}"><i class="fa-solid fa-train-subway"></i> Train/Bus</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'outside']) }}"><i class="fa-solid fa-cloud-sun"></i> Outside</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('category.search', ['category' => 'inside']) }}"><i class="fa-solid fa-house-user"></i> Inside</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </nav>
        {{-- Show up only Event menu page --}}
    @if (Route::currentRouteName() == 'event-menu' || Route::currentRouteName() == 'events.search' || Route::currentRouteName() == 'ham.search' || Route::currentRouteName() == 'category.search')
        <nav class="navbar navbar-expand-md navbar-light bg-white navbar-bottom-border navbar-fixed-height navbar-category d-none d-md-flex" style = "width: 100%;">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarCategory">
                    <a href="{{ route('category.search', ['category' => 'culture']) }}" class="me-1 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-torii-gate fa-2xl"></i>
                        <small class="d-block mt-2">Culture</small>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'fireworks']) }}" class="me-2 text-secondary text-decoration-none text-center">
                        <i class="fa-brands fa-first-order-alt fa-2xl"></i>
                        <small class="d-block mt-2">Fireworks</small>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'festival']) }}" class="me-2 text-secondary text-decoration-none text-center">
                        <i class="fas fa-theater-masks fa-2xl"></i>
                        <span class="d-block mt-2">Festival</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'food/drink']) }}" class="me-2 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-utensils fa-2xl"></i>
                        <small class="d-block mt-2">Food/Drink</small>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'sport']) }}" class="me-2 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-baseball-bat-ball fa-2xl"></i>
                        <span class="d-block mt-2">Sport</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'art']) }}" class="me-2 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-paint-brush fa-2xl"></i>
                        <span class="d-block mt-2">Art</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'music']) }}" class="me-3 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-music fa-2xl"></i>
                        <span class="d-block mt-2">Music</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'nature']) }}" class="me-2 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-leaf fa-2xl"></i>
                        <span class="d-block mt-2">Nature</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'illumination']) }}" class="me-2 text-secondary text-decoration-none text-center">
                        <i class="fa-regular fa-lightbulb fa-2xl"></i>
                        <small class="d-block mt-2">Illumination</small>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'movie']) }}" class="me-2 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-film fa-2xl"></i>
                        <span class="d-block mt-2">Movie</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'hobby']) }}" class="me-2 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-icons fa-2xl"></i>
                        <span class="d-block mt-2">Hobby</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'business']) }}" class="mx-2 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-user-tie fa-2xl"></i>
                        <span class="d-block mt-2">Business</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'online']) }}" class="me-2 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-house-laptop fa-2xl"></i>
                        <span class="d-block mt-2">Online</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'free']) }}" class="me-1 text-secondary text-decoration-none text-center">
                        <i class="fas fa-hand-holding-usd fa-xl"></i>
                        <span class="d-block mt-2">Free</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'parking']) }}" class="ps-2 me-1 text-secondary text-decoration-none text-center border border-start border-end-0 border-top-0 border-bottom-0 border-3">
                        <i class="fa-brands fa-product-hunt fa-2xl"></i>
                        <span class="d-block mt-2">Parking</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'toilet']) }}" class="me-1 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-restroom fa-2xl"></i>
                        <span class="d-block mt-2">Toilet</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'train/bus']) }}" class="me-1 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-train-subway fa-2xl"></i>
                        <small class="d-block mt-2">Train/Bus</small>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'outside']) }}" class="me-1 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-cloud-sun fa-2xl"></i>
                        <span class="d-block mt-2">Outside</span>
                    </a>
                    <a href="{{ route('category.search', ['category' => 'inside']) }}" class="me-2 text-secondary text-decoration-none text-center">
                        <i class="fa-solid fa-house-user fa-2xl"></i>
                        <span class="d-block mt-2">Inside</span>
                    </a>
                </div>
            </div>
        </nav>
    @endif
</div>
