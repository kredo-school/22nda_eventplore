@extends('layouts.app')

@section('title', 'Show Event')

@section('content')

<link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">
<link rel="stylesheet" href="{{ asset('css/show-event/eventpage.css') }}">

<div class="p-5 justify-content-center ">
    {{-- Event name & date & cate --}}
    <div class="row align-items-center mb-3">
        <div class="col-md-6">
            <h1 class="text-center">Sumidagawa Fireworks Festival</h1>
            <hr style="color: #0C2C04">
        </div>
        <div class="col-md-3 text-center">
            <p class="mb-0 fw-bold fs-5">2024 / 07 / 27 (Sat.)<br> 19:00 - 20:30</p>
        </div>
        <div class="col-md-3 justify-content-end">
            <div class="row mb-2">
                <div class="col-6">
                    <div class="tag border border-0 rounded-pill py-1 w-100">Free</div>
                </div>
                <div class="col-6">
                    <div class="tag border border-0 rounded-pill py-1 w-100">Culture</div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="tag border border-0 rounded-pill py-1 w-100">Food & Drink</div>
                </div>
                <div class="col-6">
                    <div class="tag border border-0 rounded-pill py-1 w-100">Free</div>
                </div>
            </div>
        </div>
    </div>

    {{-- images --}}
    <div class="container-fluid p-0 mb-4">
        <div class="d-flex flex-wrap w-100 mb-2" style="height: 100%;">
            <div class="px-1 justify-content-center" style="flex: 1; min-width: 50%;">
                <img src="{{ asset('images/event-test/sumida.jpg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; aspect-ratio: 1;" alt="Sumida Fireworks">
            </div>
            <div class="d-flex flex-column w-50" style="gap: 10px;">
                <div class="d-flex w-100" style="gap: 10px;">
                    <div class="w-50">
                        <img src="{{ asset('images/event-test/hanabi.jpg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; aspect-ratio: 1;" alt="Hanabi">
                    </div>
                    <div class="w-50">
                        <img src="{{ asset('images/event-test/skytree.jpg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; aspect-ratio: 1;" alt="Skytree">
                    </div>
                </div>
                <div class="d-flex w-100" style="gap: 10px;">
                    <div class="w-50">
                        <img src="{{ asset('images/event-test/river.jpg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; aspect-ratio: 1;" alt="River">
                    </div>
                    <div class="w-50">
                        <img src="{{ asset('images/event-test/yatai.jpg') }}" class="img-fluid w-100 h-100" style="object-fit: cover; aspect-ratio: 1;" alt="Yatai">
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- introduction & reserve --}}
    <div class="row mb-md-4">
        {{-- introduction --}}
        <div class="col-md-6">
            <div class="card p-2 mb-4" style="background-color: #0C2C04; max-height: 400px; overflow-y: auto;">
                <div class="card-body">
                    <div class="text-white">
                        <h2>Introduction</h2>
                        <p>The Sumida River Fireworks Festival, held annually in Tokyo, is one of Japan's most famous fireworks displays. It takes place on the last Saturday of July along the Sumida River, drawing over a million spectators.</p>

                        <h2>History</h2>
                        <p>The Sumida River Fireworks Festival, held annually in Tokyo, is one of Japan's most famous fireworks displays. It takes place on the last Saturday of July along the Sumida River, drawing over a million spectators.</p>
                        <p><a href="https://www.sumidagawa-hanabi.com/" class="text-white">https://www.sumidagawa-hanabi.com/</a></p>
                        <div class="mt-4 text-end">
                            <p class="text-white">Follow this event’s owner</p>
                            <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-xl"></i></a>
                            <a href="#" class="text-white me-3"><i class="fa-brands fa-x-twitter fa-xl"></i></a>
                            <a href="#" class="text-white me-4"><i class="fab fa-instagram fa-xl"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Before Reservation --}}
        {{-- <div class="col-md-6">
            <div class="card px-5 pt-3 mb-4 shadow" style="height: 400px;">
                <div class="card-body text-center">
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-yen-sign icon-lg"></i>
                        </div>
                        <div class="ms-3 text-center flex-grow-1">
                            <h3 class="mb-0">5,000 yen / per person</h3>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-users icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start flex-grow-1">
                            <select class="form-select">
                                <option>1 person</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-calendar-days icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start flex-grow-1">
                            <select class="form-select">
                                <option>Select Date</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-regular fa-clock icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start flex-grow-1">
                            <select class="form-select">
                                <option>Select Time</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-green px-5 py-2" data-bs-toggle="modal" data-bs-target="#user-confirm-reservation">JOIN EVENT</button>
                    <hr style="color: #0C2C04">
                    <p class="align-middle text-center pt-2 fs-3 mb-0"><strong>Total</strong> 5,000 yen</p>
                </div>
            </div>
        </div> --}}

        {{-- Reserved --}}
        <div class="col-md-6">
            <div class="card mb-4 shadow" style="min-height: 400px; max-height: 400px;">
                <div class="card-body text-center">
                    <h2 class="card-title border-top border-bottom py-2 mx-5 my-3" style="color: #84947C"><i class="fa-solid fa-check"></i>Already Reseved!</h2>
                    <div class="mb-2 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-yen-sign icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h4 class="mb-0">Total Price</h3>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h4 class="mb-0">5,000 yen</h4>
                        </div>
                    </div>
                    <div class="mb-2 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-users icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h4 class="mb-0">People</h4>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h4 class="mb-0">2</h4>
                        </div>
                    </div>
                    <div class="mb-2 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-calendar-days icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h4 class="mb-0">Date</h4>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h4 class="mb-0">2024/6/29</h4>
                        </div>
                    </div>
                    <div class="mb-2 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-regular fa-clock icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h4 class="mb-0">Time</h4>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h4 class="mb-0">11:00</h4>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        <button class="btn btn-red custom-btn me-2" data-bs-toggle="modal" data-bs-target="#user-delete-reservation"><i class="fa-regular fa-trash-can p-1"></i> Cancel Reservation</button>
                        <button class="btn btn-green custom-btn ms-2" data-bs-toggle="modal" data-bs-target="#user-edit-reservation"><i class="fa-solid fa-pen-to-square p-1"></i> Edit Reservation</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- info & map --}}
    <div class="row">
        {{-- info --}}
        <div class="col-md-6">
            <div class="card p-2 mb-4 shadow" style="height: 400px; overflow-y: auto;">
                <div class="card-body">
                    <h2>Local Information</h2>
                    <ul class="list-unstyled">
                        <li class="fs-4 d-flex align-items-center mb-2">
                            <div class="icon-container">
                                <i class="fas fa-parking"></i>
                            </div>
                            <div class="text-container">
                                <span>No Parking</span>
                            </div>
                        </li>
                        <li class="fs-4 d-flex align-items-center mb-2">
                            <div class="icon-container">
                                <i class="fas fa-train"></i>
                            </div>
                            <div class="text-container">
                                <span>Near station: Asakusa station, Tokyo Skytree station, Kuramae station, Ryogoku station, Asakusabashi station</span>
                            </div>
                        </li>
                        <li class="fs-4 d-flex align-items-center mb-2">
                            <div class="icon-container">
                                <i class="fas fa-restroom"></i>
                            </div>
                            <div class="text-container">
                                <span>Toilet: 30 toilets around here</span>
                            </div>
                        </li>
                        <li class="fs-4 d-flex align-items-center mb-2">
                            <div class="icon-container">
                                <i class="fas fa-cloud-rain"></i>
                            </div>
                            <div class="text-container">
                                <span>Light rain, event will proceed (canceled in case of severe weather)</span>
                            </div>
                        </li>
                        <li class="fs-4 d-flex align-items-center mb-2">
                            <div class="icon-container">
                                <i class="fa-brands fa-first-order-alt"></i>
                            </div>
                            <div class="text-container">
                                <span>Number of launches : about 20,000</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- location --}}
        <div class="col-md-6">
            <div class="card p-2" style="background-color: #0C2C04; height: 400px;">
                <div class="card-body">
                    <div class="text-white flex-grow-1">
                        <h2>Location</h2>
                        <div id="map-container">
                            <img src="{{ asset('images/event-test/map.png') }}" alt="map" id="map-image">
                            <div id="zoom-buttons">
                                <button class="btn btn-sm btn-light"><i class="fas fa-plus"></i></button><br>
                                <button class="btn btn-sm btn-light"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <p class="mt-2" style="display: flex; align-items: center;">
                            Access by
                            <a href="#" class="mx-2"><img src="{{ asset('images/event-test/luup.png') }}" alt="LUUP" style="width: 50px; height: auto;"></a>
                            <a href="#"><img src="{{ asset('images/event-test/go.png') }}" alt="GO" style="width: 25px; height: auto;"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    {{-- Review --}}
    <div class="contaner-fluid">
        <h2 class="ms-3">Reviews</h2>
        <div style="font-family: EB Garamond">

            <div class="align-items-center justify-content-center flex-row d-flex">
                {{--  レビューの星　--}}
                <div style="height: 200px; border: 1px solid #0C2C04" class=" w-25 rounded d-flex flex-column justify-content-center align-items-center ms-5">
                    <div class="mb-2">
                        <i class="fa-solid fa-star fa-3x"></i>
                        <span class="h1 ms-2 ">{{ number_format($averageRating, 1) }}</span>
                    </div>
                    <div class="text-center">
                        <p class="h6">( The average score customers evaluated.)</p>
                    </div>
                </div>

                {{-- レビューの評価(グラフ) --}}
                <dl class="bar-chart-002 ms-4 w-25 rounded">
                @php
                    $defaultStars = [5, 4, 3, 2, 1];
                    $ratingCountsArray = $ratingCounts->toArray();

                    $totalReviews = max($event->reviews->count(), 1);
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
            <div class="rounded p-2 col-12 col-md-6 col-lg-3 mb-3 me-2" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
                <div class="d-flex justify-content-start align-items-center">
                    <img src="{{ $review->user->avatar }}" alt="{{ $review->user->name }}" class="rounded-circle avatar-md mb-2">
                    <span class="h4 ms-2 d-flex align-items-center">{{ $review->user->username }}</span>
                </div>
                <h5><i class="fa-solid fa-star"></i>
                    {{ number_format($review->star, 1) }}
                </h5>
                <div class="mt-2">
                    <span class="overflow-ellipsis">{{ $review->comment }}</span>
                </div>
            </div>
        @endforeach
        </div>
        <div class="ms-5 my-5">
            <button class="btn btn-outline-dg" data-bs-toggle="modal" data-bs-target="#all-reviews-page">See all reviews ({{ $totalReviews }})</button>
        </div>
        @include('home.modal.show-reviews')
    </div>

    <hr>

    {{-- Related events --}}
    <div class="container-fluid">
        <h2 class="h1 my-3">Related Events</h2>
        <div class="row mb-4 justify-content-center">
            <div class="col-lg-4 col-md-6 mb-3">
                <a href="" class="text-decoration-none">
                    {{-- event card --}}
                    <div class="card shadow border-0">
                        <img src="{{ asset('images/event-test/event1.jpeg') }}" alt="" class="rounded-top-only card-img-top card-img-sm">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                {{-- event title --}}
                                <div class="col-5">
                                    <h4 class="text-dark">Event Title</h4>
                                </div>
                                <div class="col d-flex justify-content-end me-3">
                                    <h4 class="h4 text-dark"><i class="fa-solid fa-star me-2"></i>4.5</h4>
                                </div>
                            </div>
                            {{-- information --}}
                            <div class="row align-items-center gx-1 mb-2">
                                <div class="col-4">
                                    <i class="fa-solid fa-location-dot me-1"></i>Location
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category1</div>
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category2</div>
                                </div>
                            </div>
                            <div class="row align-items-center gx-1">
                                <div class="col-4">
                                    <i class="fa-solid fa-calendar-days me-1"></i>Date/Time
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10/10~11/11</div>
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10:00~17:00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <a href="" class="text-decoration-none">
                    <div class="card shadow border-0">
                        <img src="{{ asset('images/event-test/fireworktest.png') }}" alt="" class="rounded-top-only card-img-top card-img-sm">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-5">
                                    <h4 class="text-dark">Event Title</h4>
                                </div>
                                <div class="col d-flex justify-content-end me-3">
                                    <h4 class="h4 text-dark"><i class="fa-solid fa-star me-2"></i>4.5</h4>
                                </div>
                            </div>
                            <div class="row align-items-center gx-1 mb-2">
                                <div class="col-4">
                                    <i class="fa-solid fa-location-dot me-1"></i>Location
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category1</div>
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category2</div>
                                </div>
                            </div>
                            <div class="row align-items-center gx-1">
                                <div class="col-4">
                                    <i class="fa-solid fa-calendar-days me-1"></i>Date/Time
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10/10~11/11</div>
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10:00~17:00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <a href="" class="text-decoration-none">
                    <div class="card shadow border-0">
                        <img src="{{ asset('images/event-test/concert-event.jpg') }}" alt="" class="rounded-top-only card-img-top card-img-sm">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-5">
                                    <h4 class="text-dark">Event Title</h4>
                                </div>
                                <div class="col d-flex justify-content-end me-3">
                                    <h4 class="h4 text-dark"><i class="fa-solid fa-star me-2"></i>4.5</h4>
                                </div>
                            </div>
                            <div class="row align-items-center gx-1 mb-2">
                                <div class="col-4">
                                    <i class="fa-solid fa-location-dot me-1"></i>Location
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category1</div>
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category2</div>
                                </div>
                            </div>
                            <div class="row align-items-center gx-1">
                                <div class="col-4">
                                    <i class="fa-solid fa-calendar-days me-1"></i>Date/Time
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10/10~11/11</div>
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10:00~17:00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <a href="" class="text-decoration-none">
                    <div class="card shadow border-0">
                        <img src="{{ asset('images/event-test/festival_test.jpg') }}" alt="" class="rounded-top-only card-img-top card-img-sm">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-5">
                                    <h4 class="text-dark">Event Title</h4>
                                </div>
                                <div class="col d-flex justify-content-end me-3">
                                    <h4 class="h4 text-dark"><i class="fa-solid fa-star me-2"></i>4.5</h4>
                                </div>
                            </div>
                            <div class="row align-items-center gx-1 mb-2">
                                <div class="col-4">
                                    <i class="fa-solid fa-location-dot me-1"></i>Location
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category1</div>
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category2</div>
                                </div>
                            </div>
                            <div class="row align-items-center gx-1">
                                <div class="col-4">
                                    <i class="fa-solid fa-calendar-days me-1"></i>Date/Time
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10/10~11/11</div>
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10:00~17:00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <a href="" class="text-decoration-none">
                    <div class="card shadow border-0">
                        <img src="{{ asset('images/event-test/IMG_7560.JPG') }}" alt="" class="rounded-top-only card-img-top card-img-sm">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-5">
                                    <h4 class="text-dark">Event Title</h4>
                                </div>
                                <div class="col d-flex justify-content-end me-3">
                                    <h4 class="h4 text-dark"><i class="fa-solid fa-star me-2"></i>4.5</h4>
                                </div>
                            </div>
                            <div class="row align-items-center gx-1 mb-2">
                                <div class="col-4">
                                    <i class="fa-solid fa-location-dot me-1"></i>Location
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category1</div>
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category2</div>
                                </div>
                            </div>
                            <div class="row align-items-center gx-1">
                                <div class="col-4">
                                    <i class="fa-solid fa-calendar-days me-1"></i>Date/Time
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10/10~11/11</div>
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10:00~17:00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6">
                <a href="" class="text-decoration-none">
                    <div class="card shadow border-0">
                        <img src="{{ asset('images/event-test/IMG_7559.JPG') }}" alt="" class="rounded-top-only card-img-top card-img-sm">
                        <div class="card-body">
                            <div class="row align-items-center mb-3">
                                <div class="col-5">
                                    <h4 class="text-dark">Event Title</h4>
                                </div>
                                <div class="col d-flex justify-content-end me-3">
                                    <h4 class="h4 text-dark"><i class="fa-solid fa-star me-2"></i>4.5</h4>
                                </div>
                            </div>
                            <div class="row align-items-center gx-1 mb-2">
                                <div class="col-4">
                                    <i class="fa-solid fa-location-dot me-1"></i>Location
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category1</div>
                                </div>
                                <div class="col-4">
                                    <div class="tag rounded-pill py-1 w-100">Category2</div>
                                </div>
                            </div>
                            <div class="row align-items-center gx-1">
                                <div class="col-4">
                                    <i class="fa-solid fa-calendar-days me-1"></i>Date/Time
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10/10~11/11</div>
                                </div>
                                <div class="col-4 align-self-center">
                                    <div class="tag rounded-pill py-1 w-100">10:00~17:00</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

@include('users.reservations.modal.confirm')
@include('users.reservations.modal.delete')
@include('users.reservations.modal.edit')

@endsection


