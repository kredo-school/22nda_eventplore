@extends('layouts.app')

@section('title', 'Show Event')

@section('content')

<link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">



<div class="row mb-4">
    <div class="col-md-6">
        <div class="text-white p-4" style="height: 300px; background-color: #0C2C04;">
            <h2>Introduction</h2>
            <p>The Sumida River Fireworks Festival, held annually in Tokyo, is one of Japan's most famous fireworks displays. It takes place on the last Saturday of July along the Sumida River, drawing over a million spectators.</p>
            <p><a href="https://www.sumidagawa-hanabi.com/" class="text-white">https://www.sumidagawa-hanabi.com/</a></p>
            <div class="mt-4 text-end">
                <p class="text-white me-3">Follow this event's owner</p>
                <div class="d-inline-flex align-items-center">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-xl"></i></a>
                    <a href="#" class="text-white me-3"><i class="fa-brands fa-x-twitter fa-xl"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram fa-xl"></i></a>
                </div>
            </div>
        </div>
    </div>

    {{-- Before Reservation --}}
    <div class="col-md-6">
        <div class="card" style="height: 400px;">
            <div class="card-body text-center">
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <div class="d-flex justify-content-center" style="width: 50px;">
                        <i class="fa-solid fa-yen-sign icon-lg"></i>
                    </div>
                    <div class="ms-3 text-start" style="width: 20%">
                        <h3 class="mb-0">Price per a person</h3>
                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <div class="d-flex justify-content-center" style="width: 50px;">
                        <i class="fa-solid fa-users icon-lg"></i>
                    </div>
                    <div class="ms-3 text-start" style="width: 20%;">
                        <select class="form-select">
                            <option>1 person</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <div class="d-flex justify-content-center" style="width: 50px;">
                        <i class="fa-solid fa-calendar-days icon-lg"></i>
                    </div>
                    <div class="ms-3 text-start" style="width: 20%;">
                        <select class="form-select">
                            <option>Select Date</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <div class="d-flex justify-content-center" style="width: 50px;">
                        <i class="fa-regular fa-clock icon-lg"></i>
                    </div>
                    <div class="ms-3 text-start" style="width: 20%;">
                        <select class="form-select">
                            <option>Select Time</option>
                        </select>
                    </div>
                </div>
                    <button class="btn btn-green px-5 py-2 rounded-0 " data-bs-toggle="modal" data-bs-target="#user-confirm-reservation">JOIN EVENT</button>
                    <hr style="color: #0C2C04">
                    <p class="text-center fs-3 mb-0"><strong>Total</strong> 5,000 yen</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Reserved --}}
    {{-- <div class="col-md-6">
        <div class="card">
            <div class="card-body text-center">
                <h2 class="card-title border-top border-bottom py-2 mx-5 mt-3 mb-5" style="color: #84947C"><i class="fa-solid fa-check"></i>Already Reseved!</h2>
                <div class="mb-3 d-flex justify-content-center align-items-center">
                    <div class="d-flex justify-content-center" style="width: 50px;">
                        <i class="fa-solid fa-yen-sign icon-lg"></i>
                    </div>
                    <div class="ms-3 text-start" style="width: 20%">
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
                        <h3 class="mb-0">2024/6/29</h3>
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
                <div class="d-flex justify-content-center my-5">
                    <button class="btn btn-red me-3 px-5 py-2" data-bs-toggle="modal" data-bs-target="#user-confirm-reservation"><i class="fa-regular fa-trash-can"></i> Cancel Reservation</button>
                    <button class="btn btn-green px-5 py-2" data-bs-toggle="modal" data-bs-target="#user-confirm-reservation"><i class="fa-solid fa-pen-to-square"></i> Edit Reservation</button>
                </div>
            </div>
        </div>
    </div> --}}
</div>

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


<div class="container m-5 text-center">
    <button class="btn btn-green px-5 py-2 rounded-0" data-bs-toggle="modal" data-bs-target="#user-confirm-reservation">JOIN EVENT</button>
</div>
@include('users.reservations.modal.confirm')
@endsection


