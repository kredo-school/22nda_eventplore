@extends('layouts.app')

@section('title', $event->event_name)

@section('content')
@vite(['resources/js/eventDetails'])

<link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">
<link rel="stylesheet" href="{{ asset('css/show-event/eventpage.css') }}">
<link rel="stylesheet" href="{{ asset('css/review.css') }}">



<div class="p-4 mx-md-5 justify-content-center">
    {{-- Event name & date & cate --}}
    <div class="row align-items-center mb-3">
        <div class="col-md-6">
            @if ($errors->any())
                <div class="alert alert-danger ">
                    @foreach ($errors->all() as $error)
                    <i class="fa-solid fa-triangle-exclamation"></i> {{ $error }}
                    <br>
                    @endforeach
                </div>
            @endif
            @if (session('success'))
                <h5 class="alert alert-success">{{ session('success') }}</h5>
            @endif
            <h1 class="text-center">{{ $event->event_name }}</h1>
            <hr style="color: #0C2C04">
        </div>
        <div class="col-md-3 text-center">
            <p class="mb-0 fw-bold fs-5">
                {{ \Carbon\Carbon::parse($event->start_date)->format('m/d') }} 〜 {{ \Carbon\Carbon::parse($event->finish_date)->format('m/d') }}
                <br>
                {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} 〜 {{ \Carbon\Carbon::parse($event->finish_time)->format('H:i') }}
            </p>
        </div>
        @php
        $loop_count = 0;
        @endphp
        <div class="col-md-3 justify-content-end mb-2">
            @forelse($event->eventCategories as $category)

            @if($loop_count % 2 === 0)
                @if($loop_count > 0)
                    </div>
                @endif
                <div class="row mb-2">
            @endif

            <div class="col-6">
                <div class="tag border border-0 rounded-pill py-1 w-100">{{ $category->category->name }}</div>
            </div>

            @php
                $loop_count++;
            @endphp

            @empty
            <div class="col-6">
                <div class="tag border bg-secondary text-white border-0 rounded-pill py-1 w-100">No category</div>
            </div>
            @endforelse
        </div>
    </div>

    {{-- images --}}
    <div class="container-fluid mb-4 p-0">
        @php
            $images = $event->eventImages;
            $totalImages = $images->count();
        @endphp

        <div class="row m-0 p-0">
            {{-- メイン写真 --}}
            <div class="{{ $totalImages == 1 ? 'col-12' : ($totalImages == 3 ? 'col-md-8' : 'col-md-6') }} image-container m-0 p-1">
                <img src="{{ $images->first()->image }}" class="w-100 h-100 rounded {{ $totalImages == 1 ? 'ratio-2-2' : ($totalImages == 3 ? 'ratio-1-5' : 'ratio-1-1') }}" alt="{{ $event->event_name }}">

                {{-- bookmark --}}
                <div class="heart-icon-lg">
                    @if (Auth::check())
                        @if ($event->isBookmarked())
                            <form action="{{ route('user.bookmark.destroy', $event->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn text-danger">
                                    <i class="fa-solid fa-heart"></i>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('user.bookmark.store', $event->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn text-dark">
                                    <i class="fa-regular fa-heart"></i>
                                </button>
                            </form>
                        @endif
                    @else
                        <a href="{{ route('user.sign-in', ['message' => 'To have favorites, you need to sign in!']) }}" class="btn text-dark p-0 rounded-circle">
                            <i class="fa-regular fa-heart"></i>
                        </a>
                    @endif
                </div>
            </div>

            {{-- 他の画像 --}}
            <div class="{{ $totalImages >= 4 ? 'col-md-6' : ($totalImages == 3 ? 'col-md-4' : 'col-md-6') }} m-0 p-0">
                <div class="row m-0 p-0">
                    @foreach($images->slice(1) as $image)
                        <div class="{{ $totalImages >= 4 ? 'col-6' : ($totalImages == 3 ? 'col-6 col-md-12' : 'col-12') }} m-0 p-1">
                            <img src="{{ $image->image }}" class="w-100 h-100 rounded {{ $totalImages == 3 ? 'ratio-1-5' : 'ratio-1-1' }}" alt="{{ $event->event_name }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    {{-- introduction & reserve --}}
    <div class="row no-gutter mt-3">
        {{-- introduction --}}
        <div class="col-md-6 px-1">
            <div class="card p-2 mb-4" style="background-color: #0C2C04; height: 400px; overflow-y: auto;">
                <div class="card-body">
                    <div class="text-white">
                        <h2>Introduction</h2>
                        <p>{{ $event->details }}</p>

                        <h2>History</h2>
                        <p>{{ $event->history }}</p>
                        @if($event->official)
                            <p>
                                Official link <i class="fa-solid fa-arrow-right"></i>&nbsp;<a href="{{ $event->official }}" class="text-white" target="_blank"> {{ $event->official }}</a>
                            </p>
                        @endif
                        @if($event->facebook_link || $event->x_link || $event->insta_link)
                            <div class="mt-4 text-end">
                                <p class="text-white me-3">Follow this event's owner</p>
                                @if($event->facebook_link)
                                    <a href="{{ $event->facebook_link }}" class="text-white me-3" target="_blank"><i class="fab fa-facebook fa-xl"></i></a>
                                @endif
                                @if($event->x_link)
                                    <a href="{{ $event->x_link }}" class="text-white me-3" target="_blank"><i class="fa-brands fa-x-twitter fa-xl"></i></a>
                                @endif
                                @if($event->insta_link)
                                    <a href="{{ $event->insta_link }}" class="text-white me-3" target="_blank"><i class="fab fa-instagram fa-xl"></i></a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        @if(auth()->check() && $reservation != null)
        {{-- Reserved --}}
        <div class="col-md-6 px-1">
            <div class="card mb-4 shadow d-flex flex-column justify-content-center align-items-center" style="height: 400px; overflow-y: auto;">
                <h2 class="card-title border-top border-bottom mt-4 py-2 w-75 text-center" style="color: #84947C">
                    <i class="fa-solid fa-check"></i> Already Reserved!
                </h2>
                <div class="card-body text-center mt-4 w-75">
                    <div class="mb-2 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 20%;">
                            <i class="fa-solid fa-yen-sign icon-lg"></i>
                        </div>
                        <div class="text-start" style="width: 35%;">
                            <h4 class="small-text mb-0">Total Price</h4>
                        </div>
                        <div class="d-flex justify-content-center" style="width: 50%;">
                            @if(isset($totalPrice))
                            <h4 class="small-text mb-0">{{ number_format($totalPrice) }}</h4>
                            @else
                                <h4 class="small-text mb-0">N/A</h4>
                            @endif
                        </div>
                    </div>
                    <div class="mb-2 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 20%;">
                            <i class="fa-solid fa-users icon-lg"></i>
                        </div>
                        <div class="text-start" style="width: 35%;">
                            <h4 class="small-text mb-0">People</h4>
                        </div>
                        <div class="d-flex justify-content-center" style="width: 50%;">
                            <h4 class="small-text mb-0">{{ $reservation->num_tickets }}</h4>
                        </div>
                    </div>
                    <div class="mb-2 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 20%;">
                            <i class="fa-solid fa-calendar-days icon-lg"></i>
                        </div>
                        <div class="text-start" style="width: 35%;">
                            <h4 class="small-text mb-0">Date</h4>
                        </div>
                        <div class="d-flex justify-content-center" style="width: 50%;">
                            <h4 class="small-text mb-0">{{ $reservation->reservation_date }}</h4>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 20%;">
                            <i class="fa-regular fa-clock icon-lg"></i>
                        </div>
                        <div class="text-start" style="width: 35%;">
                            <h4 class="small-text mb-0">Time</h4>
                        </div>
                        <div class="d-flex justify-content-center" style="width: 50%;">
                            <h4 class="small-text mb-0">{{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}</h4>
                        </div>
                    </div>
                    @auth('web')
                    @if ($currentDate->lte($appDeadline))
                        <div class="d-flex justify-content-center mt-5">
                            <button class="btn btn-red custom-btn " data-bs-toggle="modal" data-bs-target="{{ isset($reservation) ? '#user-delete-reservation' . $reservation->id : '#' }}">
                                <i class="fa-regular fa-trash-can p-1"></i> Cancel Reservation
                            </button>
                            <button class="btn btn-green custom-btn ms-2" data-bs-toggle="modal" data-bs-target="{{ isset($reservation) ? '#user-edit-reservation' . $reservation->id : '#' }}">
                                <i class="fa-solid fa-pen-to-square p-1"></i> Edit Reservation
                            </button>
                            @include('users.reservations.modal.edit')
                            @include('users.reservations.modal.delete')
                        </div>
                    @else
                    <button class="btn btn-secondary px-5 py-2 fw-bold mt-4" style="font-family: Raleway, sans-serif;" disabled>Reservation Closed</button>
                    <p class="text-danger mt-2" style="font-family: Raleway, sans-serif;">Enjoy! <i class="fa-regular fa-face-smile"></i></p>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
        @else
        {{-- Before Reservation --}}
        <div class="col-md-6 px-1">
            <div class="card px-5 pt-3 mb-4 shadow" style="height: 400px; overflow-y: auto;">
                <div class="card-body text-center">
                    <div class="mb-3 d-flex align-items-center">
                        <div style="width: 20%;">
                            <i class="fa-solid fa-yen-sign icon-lg"></i>
                        </div>
                        <div class="text-center flex-grow-1">
                            <h3 class="mb-0">{{ number_format($event->price) }} yen / per person</h3>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <div style="width: 20%;">
                            <i class="fa-solid fa-users icon-lg"></i>
                        </div>
                        <div class="text-start flex-grow-1">
                            <select class="form-select" name="num_tickets" id="numTickets" required>
                                <option value="" hidden>Select number of tickets</option>
                                @for ($i = 1; $i <= $availableSlots; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <div style="width: 20%;">
                            <i class="fa-solid fa-calendar-days icon-lg"></i>
                        </div>
                        <div class="text-start flex-grow-1">
                            <select class="form-select" name="event_date" >
                                <option value="" selected hidden>Select Date</option>
                                @foreach ($eventDates as $date)
                                    <option value="{{ $date }}">{{ \Carbon\Carbon::parse($date)->format('Y/m/d') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <div style="width: 20%;">
                            <i class="fa-regular fa-clock icon-lg"></i>
                        </div>
                        <div class="text-start flex-grow-1">
                            <select class="form-select mt-2" name="event_time">
                                <option value="" selected hidden>Select Time</option>
                                @foreach ($eventTimes as $time)
                                    <option value="{{ $time }}">{{ $time }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @auth('web')
                        @if ($currentDate->lte($appDeadline))
                            @if($availableSlots > 0)
                                <button class="btn btn-green px-5 py-2" data-bs-toggle="modal" data-bs-target="#user-confirm-reservation">JOIN EVENT</button>
                                @include('users.reservations.modal.confirm')
                            @else
                                <button class="btn btn-secondary px-5 py-2 fw-bold" style="font-family: Raleway,sans-serif;" disabled>Reservation Closed</button>
                                <p class="text-danger mt-2 fw-bold" style="font-family: Raleway,sans-serif;">Sold Out.&nbsp;Thank you! <i class="fa-regular fa-face-smile"></i></p>
                            @endif
                        @else
                            <button class="btn btn-secondary px-5 py-2 fw-bold" style="font-family: Raleway,sans-serif;" disabled>Reservation Closed</button>
                            <p class="text-danger mt-2" style="font-family: Raleway,sans-serif;">The reservation deadline has passed.</p>
                        @endif
                    @else
                        @if($availableSlots > 0)
                            <a href="{{ route('user.sign-in', ['message' => 'To make a reservation, you need to sign in!']) }}" class="btn btn-green px-5 py-1">
                                JOIN EVENT <div class="small">after sign-in</div>
                            </a>
                        @else
                            <button class="btn btn-secondary px-5 py-2 fw-bold" style="font-family: Raleway,sans-serif;" disabled>Reservation Closed</button>
                            <p class="text-danger mt-2 fw-bold" style="font-family: Raleway,sans-serif;">Sold Out.&nbsp;Thank you! <i class="fa-regular fa-face-smile"></i></p>
                        @endif
                    @endauth
                    <hr style="color: #0C2C04">
                    <p class="align-middle text-center fs-3 mb-0">Total <span id="totalPrice" data-price="{{ $event->price }}">{{ number_format($event->price) }}</span> yen</p>
                </div>
            </div>
        </div>
        @endif
    </div>

    {{-- info & map --}}
    <div class="row mb-3 no-gutter">
        {{-- info --}}
        <div class="col-md-6 px-1">
            <div class="card p-2 mb-4 shadow" style="height: 400px; overflow-y: auto;">
                <div class="card-body">
                    <h2>Local Information</h2>
                    <ul class="list-unstyled">
                        <li class="fs-4 d-flex align-items-center mb-2">
                            <div class="icon-container" style="flex-shrink: 0; width: 40px;">
                                <i class="fas fa-parking"></i>
                            </div>
                            <div class="text-container ms-1">
                                <span>{{ $event->parking }}</span>
                            </div>
                        </li>
                        <li class="fs-4 d-flex align-items-center mb-2">
                            <div class="icon-container" style="flex-shrink: 0; width: 40px;">
                                <i class="fas fa-train"></i>
                            </div>
                            <div class="text-container ms-1">
                                <span>{{ $event->train }}</span>
                            </div>
                        </li>
                        <li class="fs-4 d-flex align-items-center mb-2">
                            <div class="icon-container" style="flex-shrink: 0; width: 40px;">
                                <i class="fas fa-restroom"></i>
                            </div>
                            <div class="text-container ms-1">
                                <span>{{ $event->toilet }}</span>
                            </div>
                        </li>
                        <li class="fs-4 d-flex align-items-center mb-2">
                            <div class="icon-container" style="flex-shrink: 0; width: 40px;">
                                <i class="fas fa-cloud-rain"></i>
                            </div>
                            <div class="text-container ms-1">
                                <span>{{ $event->weather }}</span>
                            </div>
                        </li>
                        <li class="fs-4 d-flex align-items-center mb-2">
                            <div class="icon-container" style="flex-shrink: 0; width: 40px;">
                                <i class="fa-brands fa-first-order-alt"></i>
                            </div>
                            <div class="text-container ms-1">
                                <span>{{ $event->add_info }}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- location --}}
        <div class="col-md-6 mb-4 px-1">
            <div class="card pt-2 px-2 pb-0" style="background-color: #0C2C04; height: 400px;">
                <div class="card-body" style="overflow-y: auto">
                    <div class="text-white flex-grow-1">
                        <h2>Location</h2>
                        <p class="mb-2">Address: {{ $event->address }}</p>
                        <div id="map-container">
                            {{-- map --}}
                            <div id="map" class="w-100 h-100"></div>
                            <script>window.eventData = @json($event); </script>
                        </div>
                        <p class="mt-3 mb-0" style="display: flex; align-items: center;">
                            Access by
                            <a href="https://luup.sc/en/" class="mx-2" target="_blank"><img src="{{ asset('images/event-test/luup.png') }}" alt="LUUP" style="width: 50px; height: auto;"></a>
                            <a href="https://go.goinc.jp/lp/inbound" target="_blank"><img src="{{ asset('images/event-test/go.png') }}" alt="GO" style="width: 25px; height: auto;"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    {{-- Review --}}
    <div class="contaner-fluid mb-3">
        <h2 class="h1 mt-2">Reviews</h2>
        <div style="font-family: EB Garamond" class="review-container">
            <div class="align-items-center justify-content-center flex-row d-flex flex-wrap">
                {{--  レビューの星　--}}
                {{-- <div class="review-container"> --}}
                    <div class="review-star-container rounded d-flex flex-column justify-content-center align-items-center m-0">
                        @php
                            $averageRating = number_format($averageRating, 1);
                            $fullStars = floor($averageRating);
                            $halfStar = ($averageRating > $fullStars);
                        @endphp
                        <div>
                            <span class="h1 mb-2">{{ $averageRating }}</span>
                        </div>
                        <div class="mb-2 d-flex align-items-center">
                            {{-- フルの星 --}}
                            @for ($i = 1; $i <= $fullStars; $i++)
                                <i class="fa-solid fa-star fa-2x"></i>
                            @endfor

                            {{-- 半分の星 --}}
                            @if ($halfStar)
                                <i class="fa-solid fa-star fa-2x half-filled"></i>
                            @endif

                            {{-- 空の星 --}}
                            @for ($i = $fullStars + ($halfStar ? 1 : 0); $i < 5; $i++)
                                <i class="fa-solid fa-star fa-2x empty"></i>
                            @endfor

                        </div>
                        <div class="text-center">
                            <p class="h6">( The average score customers evaluated. )</p>
                        </div>
                    </div>
                {{-- </div> --}}
                {{-- レビューの評価(グラフ) --}}
                <dl class="bar-chart-002 rounded mt-3 mb-0">
                    @php
                        $defaultStars = [5, 4, 3, 2, 1];
                        $ratingCountsArray = $ratingCounts->toArray();
                        $totalReviews = $event->reviews->count();
                    @endphp
                    @foreach($defaultStars as $star)
                    <div>
                        <dt>{{ $star }}:</dt>
                        @php
                            // 評価のカウントを取得（存在しない場合は0）
                            $count = $ratingCountsArray[$star] ?? 0;
                            // 幅の計算（0%も表示されるように）
                            $width = ($totalReviews > 0) ? ($count / $totalReviews) * 100 : 0;
                            $widthInt = (int) floor($width);
                        @endphp
                        <dd>
                            <span style="display: inline-block; width: {{ $width }}%;">
                                {{ $widthInt }}%
                            </span>
                        </dd>
                    </div>
                    @endforeach
                </dl>
            </div>
        </div>
        {{-- コメントが3件だけ見れる --}}
        <div class="d-flex justify-content-center mt-4 w-100 flex-wrap">
        @foreach($latestReviews as $review)
            <div class="rounded p-2 col-12 col-md-5 col-lg-3 mb-3 me-2" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
                <div class="d-flex justify-content-start align-items-center">
                    @if ($review->user->avatar)
                        <img src="{{ $review->user->avatar }}" alt="{{ $review->user->name }}" class="rounded-circle avatar-md mb-2">
                    @else
                        <i class="fa-solid fa-circle-user avatar-md mb-2"></i>
                    @endif
                    <span class="h4 ms-2 m-0 d-flex align-items-center">{{ $review->user->username }}</span>
                </div>
                <div class="star-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fa-solid fa-star {{ $i <= $review->star ? 'filled' : '' }}"></i>
                    @endfor
                </div>
                <div class="mt-2">
                    <span class="overflow-ellipsis">{{ $review->comment }}</span>
                </div>
            </div>
        @endforeach
        </div>
        <div class="my-4">
            <button class="btn btn-outline-dg" data-bs-toggle="modal" data-bs-target="#all-reviews-page">See all reviews({{ $totalReviews }})</button>
                @include('home.modal.show-reviews')
        </div>
    </div>

    <hr>

    {{-- Related events --}}
    <div class="container-fluid mb-4">
        <h2 class="h1 my-3">Related Events</h2>
        <div class="row">
            @forelse ($related_events as $event)
                <div class="col-lg-4 col-md-6 mb-3">
                    <a href="{{ route('event.details.show', $event->id) }}" class="text-decoration-none">
                        {{-- event card --}}
                        <div class="card shadow border-0" id="event-card-{{$event->id}}">
                            @php
                                $carouselId = 'carousel' . $event->id;
                            @endphp

                            @if ($event->eventImages->isEmpty())
                                <div class="image-container">
                                    <img src="{{ asset('images/event-test/noimage.png') }}" alt="no image" class="rounded-top-only card-img-top card-img-sm">
                                    {{-- bookmark --}}
                                    <div class="heart-icon">
                                        @if (Auth::check())
                                            @if ($event->isBookmarked())
                                                <form action="{{ route('user.bookmark.destroy', $event->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn text-danger">
                                                        <i class="fa-solid fa-heart"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('user.bookmark.store', $event->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn text-dark">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <a href="{{ route('user.sign-in', ['message' => 'To have favorites, you need to sign in!']) }}" class="btn text-dark p-0 rounded-circle">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @elseif ($event->eventImages->count() == 1)
                                <div class="image-container">
                                    <img src="{{ $event->eventImages->first()->image }}" alt="{{ $event->event_name }}" class="rounded-top-only card-img-top card-img-sm">
                                    {{-- bookmark --}}
                                    <div class="heart-icon">
                                        @if (Auth::check())
                                            @if ($event->isBookmarked())
                                                <form action="{{ route('user.bookmark.destroy', $event->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn text-danger">
                                                        <i class="fa-solid fa-heart"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('user.bookmark.store', $event->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn text-dark">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <a href="{{ route('user.sign-in', ['message' => 'To have favorites, you need to sign in!']) }}" class="btn text-dark p-0 rounded-circle">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @else
                                <div id="{{ $carouselId }}" class="carousel slide">
                                    <div class="carousel-indicators">
                                        @foreach ($event->eventImages as $index => $image)
                                            <button type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}" aria-current="true" aria-label="Slide {{ $index + 1 }}"></button>
                                        @endforeach
                                    </div>
                                    <div class="carousel-inner">
                                        @foreach ($event->eventImages as $index => $image)
                                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                                <img src="{{ $image->image }}" alt="{{ $event->event_name }}" class="rounded-top-only card-img-top card-img-sm">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#{{ $carouselId }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    {{-- bookmark --}}
                                    <div class="heart-icon">
                                        @if (Auth::check())
                                            @if ($event->isBookmarked())
                                                <form action="{{ route('user.bookmark.destroy', $event->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn text-danger">
                                                        <i class="fa-solid fa-heart"></i>
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('user.bookmark.store', $event->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn text-dark">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <a href="{{ route('user.sign-in', ['message' => 'To have favorites, you need to sign in!']) }}" class="btn text-dark p-0 rounded-circle">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <div class="card-body px-2">
                                <div class="row align-items-center">
                                    {{-- event title --}}
                                    <div class="col-11 pe-0">
                                        <h4 class="overflow_dot text-dark">{{ $event->event_name }}</h4>
                                    </div>
                                    {{-- review --}}
                                    <div class="col d-flex justify-content-end mb-1 me-1">
                                        @if ($event->reviews->isEmpty())
                                            <h6 class="text-muted overflow_cut">No Reviews</h6><h4 style="visibility: hidden">.</h4>
                                        @else
                                            <h4 class="h4 text-dark overflow_cut"><i class="fa-solid fa-star me-1 star-color"></i>{{ number_format($event->reviews->avg('star'), 1) }}</h4>
                                        @endif
                                    </div>
                                </div>
                                {{-- information --}}
                                <div class="row align-items-center gx-1 mb-2">
                                    <div class="col-4 overflow_dot">
                                        <i class="fa-solid fa-location-dot me-1"></i>{{ $event->area->name }} area
                                    </div>
                                    @php
                                        $loop_count = 0;
                                    @endphp
                                    @forelse($event->EventCategories as $event_category)
                                        @if ($loop_count < 2)
                                            <div class="col-4">
                                                <div class="tag rounded-pill overflow_dot py-1 w-100">{{ $event_category->category->name }}</div>
                                            </div>
                                            @php
                                                $loop_count++;
                                            @endphp
                                        @endif
                                    @empty
                                        <div class="col-8">
                                            <div class="tag rounded-pill bg-secondary overflow_dot py-1 text-white w-50">No Category</div>
                                        </div>
                                    @endforelse
                                </div>
                                <div class="row align-items-center gx-1">
                                    <div class="col-4">
                                        <i class="fa-solid fa-calendar-days me-1"></i>Date/Time
                                    </div>
                                    <div class="col-4 align-self-center">
                                        <div class="tag rounded-pill overflow_dot py-1 w-100">
                                            @if ($event->start_date == $event->finish_date)
                                                {{ date('m/d', strtotime($event->start_date)) }}
                                            @else
                                                {{ date('m/d', strtotime($event->start_date)) }}~{{ date('m/d', strtotime($event->finish_date)) }}
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-4 align-self-center">
                                        <div class="tag rounded-pill overflow_dot py-1 w-100">{{ date('H:i', strtotime($event->start_time)) }}~{{ date('H:i', strtotime($event->finish_time)) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                {{-- No related events --}}
                <div>
                    <h5 class="ms-4">No Related events Found.</h5>
                </div>
            @endforelse
        </div>
    </div>
</div>

{{-- Topに戻るボタン --}}
<a href="#" id="back-to-top"><i class="fa-solid fa-circle-chevron-up"></i></a>

@endsection
