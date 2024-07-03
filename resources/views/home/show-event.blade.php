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
                <div class="col-md-6">
                    <div class="tag border border-0 rounded-pill py-1 w-100">Free</div>
                </div>
                <div class="col-md-6">
                    <div class="tag border border-0 rounded-pill py-1 w-100">Culture</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="tag border border-0 rounded-pill py-1 w-100">Food & Drink</div>
                </div>
                <div class="col-md-6">
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
    <div class="row mb-4 ">
        {{-- introduction --}}
        <div class="col-md-6">
            <div class="card p-2 mt-2" style="background-color: #0C2C04; min-height: 400px; max-height: 400px; overflow-y: auto;">
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
        <div class="col-md-6">
            <div class="card p-3 mt-2 shadow" style="min-height: 400px; max-height: 400px;">
                <div class="card-body text-center px-5">
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-yen-sign icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start flex-grow-1">
                            <h3 class="mb-0">5,000 yen</h3>
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
                    <div>
                        <button class="btn btn-green px-5 p-2" data-bs-toggle="modal" data-bs-target="#user-confirm-reservation">JOIN EVENT</button>
                        <hr style="color: #0C2C04">
                        <p class="align-middle text-center pt-2 fs-3 mb-0"><strong>Total</strong> 5,000 yen</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Reserved --}}
        {{-- <div class="col-md-6">
            <div class="card mt-2" style="min-height: 400px; max-height: 400px;">
                <div class="card-body text-center mt-4">
                    <h2 class="card-title border-top border-bottom py-2 mx-5 mb-3" style="color: #84947C"><i class="fa-solid fa-check"></i>Already Reseved!</h2>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center">
                            <i class="fa-solid fa-yen-sign icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start">
                            <h3 class="mb-0">Total Price</h3>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h3 class="mb-0">5,000 yen</h3>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-users icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h3 class="mb-0">People</h3>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h3 class="mb-0">2</h3>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-solid fa-calendar-days icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h3 class="mb-0">Date</h3>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h4 class="mb-0">2024/6/29</h4>
                        </div>
                    </div>
                    <div class="mb-3 d-flex justify-content-center align-items-center">
                        <div class="d-flex justify-content-center" style="width: 50px;">
                            <i class="fa-regular fa-clock icon-lg"></i>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h3 class="mb-0">Time</h3>
                        </div>
                        <div class="ms-3 text-start" style="width: 20%;">
                            <h3 class="mb-0">11:00</h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-red me-2" data-bs-toggle="modal" data-bs-target="#user-delete-reservation"><i class="fa-regular fa-trash-can"></i> Cancel Reservation</button>
                        <button class="btn btn-green ms-2" data-bs-toggle="modal" data-bs-target="#user-edit-reservation"><i class="fa-solid fa-pen-to-square"></i> Edit Reservation</button>
                    </div>
                </div>


            </div>
        </div> --}}
    </div>

    {{-- info & map --}}
    <div class="row mb-4">
        {{-- info --}}
        <div class="col-md-6">
            <div class="card p-2 mt-2 shadow" style="min-height: 400px; max-height: 400px;">
                <div class="card-body text-start fs-4">
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

        {{-- location map --}}
        <div class="col-md-6">
            <div class="card p-2 mt-2" style="background-color: #0C2C04; min-height: 400px; max-height: 400px;">
                <div class="card-body px-4">
                    <div class="text-white">
                        <h2>Location</h2>
                        <div id="map-container" style="position: relative;">
                            <img src="{{ asset('images/event-test/map.png') }}" alt="map" id="map-image" class="w-100">
                            <div id="zoom-buttons" style="position: absolute; top: 10px; right: 10px;">
                                <button class="btn btn-sm btn-light"><i class="fas fa-plus"></i></button><br>
                                <button class="btn btn-sm btn-light"><i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <p class="mt-2">
                            Access by
                            <a href=""><img src="{{ asset('images/event-test/luup.png') }}" alt="" style="width: 10%; height: 15%;"></a>
                            <a href=""><img src="{{ asset('images/event-test/go.png') }}" alt="" style="width: 5%; height: 5%;"></a>
                        </p>
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
            <div class="d-flex justify-content-center mt-4 ">
                <div class="rounded p-2 me-3" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
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
                <div class="rounded p-2 me-3" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
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
                <div class="rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
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
        <div class="container">
            <h2 class="h1 my-3">Related Events</h2>
            <div class="row mb-4 justify-content-center">
                <div class="col-4">
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
                <div class="col-4">
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
                <div class="col-4">
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
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col-4">
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
                <div class="col-4">
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
                <div class="col-4">
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

    <hr>

    {{-- Review --}}
    <div class="contaner-fluid">
        <h2 class="ms-5">Reviews</h2>
        <div style="font-family: EB Garamond">

            <div class="align-items-center justify-content-center flex-row d-flex">
                {{--  レビューの星　--}}
                <div style="width: 400px; height: 200px; border: 1px solid #0C2C04" class="rounded d-flex flex-column justify-content-center align-items-center ms-5">
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
        <div class="d-flex justify-content-center mt-4 ">
            <div class="rounded p-2 me-3" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
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
            <div class="rounded p-2 me-3" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
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
            <div class="rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
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
    <div class="container">
        <h2 class="h1 my-3">Related Events</h2>
        <div class="row mb-4 justify-content-center">
            <div class="col-4">
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
            <div class="col-4">
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
            <div class="col-4">
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
        </div>
        <div class="row mb-4 justify-content-center">
            <div class="col-4">
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
            <div class="col-4">
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
            <div class="col-4">
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


