@extends('layouts.app')

@section('title', 'Event Menu')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show-event/event-menu.css') }}">

    {{-- menu offcanvas --}}
    <div class="cp_cont">
        <div class="cp_offcanvas">
            <input type="checkbox" id="cp_toggle" checked>
            <label for="cp_toggle"></label>
            <div class="cp_menu">
                <div class="row ms-2 me-2">
                    {{-- title --}}
                    <div class="mb-3">
                        <h2 class="h1 ms-1 mt-3"><i class="fa-solid fa-clipboard-list me-2"></i>Event menu list</h2>
                    </div>
                    {{-- event list --}}
                    <div class="col-6 mb-4">
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

                    <div class="col-6 mb-4">
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

                    <div class="col-6 mb-4">
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

                    <div class="col-6 mb-4">
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

                    <div class="col-6 mb-4">
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

                    <div class="col-6 mb-4">
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
    </div>

    {{-- map --}}
    <div class="w-100 p-0">
        <img src="{{ asset('images/event-test/map.png') }}" alt="map" class="map">
    </div>

@endsection
