@extends('layouts.app')

@section('title', 'Event Menu')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">

    <div class="container py-4">
        
        <div class="row w-50">
            <div class="mb-4">
                <h2 class="h1 ms-1 mb-2"><i class="fa-solid fa-clipboard-list me-2"></i>Event menu list</h2>
            </div>
            <div class="col-6 mb-4">
                <div class="card shadow border-0">
                    <img src="images/event-test/event1.jpeg" alt="" class="rounded card-img-top card-img-sm">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end me-3">
                                <a href="" class="h4 text-dark text-decoration-none"><i class="fa-solid fa-star me-2"></i>4.5</a>
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
            </div>

            <div class="col-6 mb-4">
                <div class="card shadow border-0">
                    <img src="images/event-test/fireworktest.png" alt="" class="rounded card-img-top card-img-sm">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end me-3">
                                <a href="" class="h4 text-dark text-decoration-none"><i class="fa-solid fa-star me-2"></i>4.5</a>
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
            </div>

            <div class="col-6 mb-4">
                <div class="card shadow border-0">
                    <img src="images/event-test/concert-event.jpg" alt="" class="rounded card-img-top card-img-sm">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end me-3">
                                <a href="" class="h4 text-dark text-decoration-none"><i class="fa-solid fa-star me-2"></i>4.5</a>
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
            </div>

            <div class="col-6 mb-4">
                <div class="card shadow border-0">
                    <img src="images/event-test/festival_test.jpg" alt="" class="rounded card-img-top card-img-sm">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end me-3">
                                <a href="" class="h4 text-dark text-decoration-none"><i class="fa-solid fa-star me-2"></i>4.5</a>
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
            </div>

            <div class="col-6 mb-4">
                <div class="card shadow border-0">
                    <img src="images/event-test/IMG_7560.JPG" alt="" class="rounded card-img-top card-img-sm">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end me-3">
                                <a href="" class="h4 text-dark text-decoration-none"><i class="fa-solid fa-star me-2"></i>4.5</a>
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
            </div>

            <div class="col-6 mb-4">
                <div class="card shadow border-0">
                    <img src="images/event-test/IMG_7559.JPG" alt="" class="rounded card-img-top card-img-sm">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end me-3">
                                <a href="" class="h4 text-dark text-decoration-none"><i class="fa-solid fa-star me-2"></i>4.5</a>
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
            </div>

        </div>
    </div>
    @include('event-owners.events.modal.delete')

@endsection
