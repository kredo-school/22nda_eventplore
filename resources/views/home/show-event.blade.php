@extends('layouts.app')

@section('title', 'Show Event')

@section('content')
@vite(['resources/js/mapbox.js'])
@vite(['resources/js/eventDetails'])


<link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">
<link rel="stylesheet" href="{{ asset('css/show-event/eventpage.css') }}">

<div class="p-5 m-5 justify-content-center">
    {{-- Event name & date & cate --}}
    <div class="row align-items-center mb-3">
        <div class="col-md-6">
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
        <div class="col-md-3 justify-content-end">
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
    <div class="container-fluid p-0 mb-4">
        <div class="d-flex flex-wrap w-100 mb-2 image-part" style="height: 100%; overflow-x: auto;">
            @php
                $images = $event->eventImages;
                $firstImage = $images->first();
                $otherImages = $images->slice(1);
                $totalOtherImages = $otherImages->count();
            @endphp

            {{-- メイン写真 --}}
            <div class="justify-content-center p-1 main-image @if($totalOtherImages <= 2) w-75 @else w-50 @endif" style="flex: 1;">
                <img src="{{ $firstImage->image }}" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="#">
            </div>

            {{-- 他の画像 --}}
            <div class="d-flex flex-wrap other-images @if($totalOtherImages <= 2) w-25 @else w-50 @endif">
                @foreach($otherImages as $image)
                    <div class="w-50 p-1">
                        <img src="{{ $image->image }}" class="img-fluid" style="object-fit: cover; aspect-ratio: 1;" alt="#">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


    {{-- introduction & reserve --}}
    <div class="row mb-md-4">
        {{-- introduction --}}
        <div class="col-md-6">
            <div class="card p-2 mb-4" style="background-color: #0C2C04; height: 400px; overflow-y: auto;">
                <div class="card-body">
                    <div class="text-white">
                        <h2>Introduction</h2>
                        <p>{{ $event->details }}</p>

                        <h2>History</h2>
                        <p>{{ $event->history }}</p>
                        <p>
                            Official link <i class="fa-solid fa-arrow-right"></i>&nbsp;<a href="{{ $event->official }}" class="text-white"> {{ $event->official }}</a>
                        </p>
                        <div class="mt-4 text-end">
                            <p class="text-white">Follow this event's owner</p>
                            <a href="{{ $event->facebook_link }}" class="text-white me-3"><i class="fab fa-facebook fa-xl"></i></a>
                            <a href="{{ $event->x_link }}" class="text-white me-3"><i class="fa-brands fa-x-twitter fa-xl"></i></a>
                            <a href="{{ $event->insta_link }}" class="text-white me-4"><i class="fab fa-instagram fa-xl"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @if(auth()->check() && $reservation != null)
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
                            @if(isset($totalPrice))
                            <h4 class="mb-0">{{ number_format($totalPrice) }}</h4>
                            @else
                                <h4 class="mb-0">N/A</h4>
                            @endif
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
                            <h4 class="mb-0">{{ $reservation->num_tickets }}</h4>
                        </div>
                    </div>
                    <div class="mb-2 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-calendar-days icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h4 class="mb-0">Date</h4>
                        </div>
                        <div class="ms-3 text-start">
                            <h4 class="mb-0">{{ $reservation->reservation_date }}</h4>
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
                            <h4 class="mb-0">{{ \Carbon\Carbon::parse($reservation->time)->format('H:i') }}</h4>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center my-4">
                        <button class="btn btn-red custom-btn me-2" data-bs-toggle="modal" data-bs-target="{{ isset($reservation) ? '#user-delete-reservation' . $reservation->id : '#' }}"><i class="fa-regular fa-trash-can p-1"></i> Cancel Reservation</button>
                        <button class="btn btn-green custom-btn ms-2" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="{{ isset($reservation) ? '#user-edit-reservation' . $reservation->id : '#' }}"><i class="fa-solid fa-pen-to-square p-1"></i> Edit Reservation</button>
                        @include('users.reservations.modal.edit')
                        @include('users.reservations.modal.delete')
                    </div>
                </div>
            </div>
        </div>
        @else
        {{-- Before Reservation --}}
        <div class="col-md-6">
            <div class="card px-5 pt-3 mb-4 shadow" style="height: 400px;">
                <div class="card-body text-center">
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-yen-sign icon-lg"></i>
                        </div>
                        <div class="ms-3 text-center flex-grow-1">
                            <h3 class="mb-0">{{ number_format($event->price) }} yen / per person</h3>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-users icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start flex-grow-1">
                            <select class="form-select" name="num_tickets" id="numTickets">
                                <option value="1" hidden>1 person</option>
                                @for ($i = 1; $i <= $availableSlots; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-calendar-days icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start flex-grow-1">
                            <select class="form-select" name="event_date" >
                                <option value="" hidden>Select Date</option>
                                @foreach ($eventDates as $date)
                                    <option value="{{ $date }}">{{ \Carbon\Carbon::parse($date)->format('Y/m/d') }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-regular fa-clock icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start flex-grow-1">
                            <select class="form-select mt-2" name="event_time">
                                <option value="" hidden>Select Time</option>
                                @foreach ($eventTimes as $time)
                                    <option value="{{ $time }}">{{ $time }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-green px-5 py-2" data-bs-toggle="modal" data-bs-target="#user-confirm-reservation">JOIN EVENT</button>
                    @include('users.reservations.modal.confirm')
                    <hr style="color: #0C2C04">
                    <p class="align-middle text-center pt-2 fs-3 mb-0">Total <span id="totalPrice" data-price="{{ $event->price }}">{{ number_format($event->price) }}</span> yen</p>
                </div>
            </div>
        </div>
        @endif
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
        <div class="col-md-6">
            <div class="card p-2" style="background-color: #0C2C04; height: 400px;">
                <div class="card-body">
                    <div class="text-white flex-grow-1">
                        <h2>Location</h2>
                        <div id="map-container">
                            {{-- map --}}
                            <div id="map"></div>
                            {{-- <img src="{{ asset('images/event-test/map.png') }}" alt="map" id="map-image"> --}}
                            <div id="zoom-buttons">
                                <button class="btn btn-sm btn-light"><i class="fas fa-plus"></i></button><br>
                                <button class="btn btn-sm btn-light"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <p class="mt-2" style="display: flex; align-items: center;">
                            Access by
                            <a href="https://luup.sc/en/" class="mx-2"><img src="{{ asset('images/event-test/luup.png') }}" alt="LUUP" style="width: 50px; height: auto;"></a>
                            <a href="https://go.goinc.jp/lp/inbound"><img src="{{ asset('images/event-test/go.png') }}" alt="GO" style="width: 25px; height: auto;"></a>
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
                        <span class="h1 ms-2 ">4.5</span>
                    </div>
                    <div class="text-center">
                        <p class="h6">( The average score customers evaluated .)</p>
                    </div>
                </div>

                {{-- レビューの評価(グラフ) --}}
                <dl class="bar-chart-002 ms-4 w-25 rounded">
                    <div>
                        <dt>5:</dt>
                        <dd><span style="width: 80%">80%</span></dd>
                    </div>
                    <div>
                        <dt>4:</dt>
                        <dd><span style="width: 10%">10%</span></dd>
                    </div>
                    <div>
                        <dt>3:</dt>
                        <dd><span style="width: 5%">5%</span></dd>
                    </div>
                    <div>
                        <dt>2:</dt>
                        <dd><span style="width: 3%"> 3%</span></dd>
                    </div>
                    <div>
                        <dt>1:</dt>
                        <dd><span style="width: 2%">2%</span></dd>
                    </div>
                </dl>
            </div>
        </div>
        {{-- コメントが3件だけ見れる --}}
        <div class="d-flex justify-content-center mt-4 w-100 flex-wrap">
            <div class="rounded p-2 col-12 col-md-6 col-lg-3 mb-3 me-2" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
                <div class="d-flex justify-content-start align-items-center">
                    <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle m-2" style="width: 36px; height: 36px;">
                    <span class="h5 ms-2 d-flex align-items-center">John Smith</span>
                </div>
                <i class="fa-solid fa-star"></i>
                <span class="me-2 h5">5.0</span>
                <div class="mt-2">
                    <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
                </div>
            </div>
            <div class="rounded p-2 col-12 col-md-6 col-lg-3 mb-3 me-2" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
                <div class="d-flex justify-content-start align-items-center">
                    <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle m-2" style="width: 36px; height: 36px;">
                    <span class="h5 ms-2 d-flex align-items-center">John Smith</span>
                </div>
                <i class="fa-solid fa-star"></i>
                <span class="me-2 h5">5.0</span>
                <div class="mt-2">
                    <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
                </div>
            </div>
            <div class="rounded p-2 col-12 col-12 col-md-6 col-lg-3 me-2" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
                <div class="d-flex justify-content-start align-items-center">
                    <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle m-2" style="width: 36px; height: 36px;">
                    <span class="h5 ms-2 d-flex align-items-center">John Smith</span>
                </div>
                <i class="fa-solid fa-star"></i>
                <span class="me-2 h5">5.0</span>
                <div class="mt-2">
                    <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
                </div>
            </div>
        </div>
        <div class="ms-5 my-5">
            <button class="btn btn-outline-dg" data-bs-toggle="modal" data-bs-target="#all-reviews-page">See all reviews(135)</button>
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

@endsection


