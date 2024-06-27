@extends('layouts.app')

@section('title', 'Show Event')

@section('content')

    <link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">

    <div class="container py-4">
        <div class="mb-4 d-grid mx-auto">
            {{-- title --}}
            <h2 class="h1 text-center mb-3"><i class="fa-solid fa-clipboard-list me-2"></i>Event list</h2>
            {{-- register button --}}
            <a href="#" class="btn btn-green mx-auto"><i class="fa-solid fa-circle-plus me-1"></i>Register Event</a>
        </div>
        {{-- event list --}}
        <div class="row">
            <div class="col-4 mb-4">
                <div class="card shadow border-0">
                    <img src="{{ asset('images/event-test/event1.jpeg') }}" alt="" class="rounded card-img-top">
                   
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="" class="btn btn-outline-dark me-2"><i class="fa-solid fa-user-group me-1"></i>20</a>
                                <a href="" class="btn btn-green me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" class="btn btn-red" data-bs-toggle="modal" data-bs-target="#eventowner-delete-event"><i class="fa-solid fa-trash-can"></i></a>
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

            <div class="col-4 mb-4">
                <div class="card shadow border-0">
                    <img src="{{ asset('images/event-test/fireworktest.png') }}" alt="" class="rounded card-img-top">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="" class="btn btn-outline-dark me-2"><i class="fa-solid fa-user-group me-1"></i>20</a>
                                <a href="" class="btn btn-green me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" class="btn btn-red" data-bs-toggle="modal" data-bs-target="#eventowner-delete-event"><i class="fa-solid fa-trash-can"></i></a>
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

            <div class="col-4 mb-4">
                <div class="card shadow border-0">
                    <img src="{{ asset('images/event-test/concert-event.jpg') }}" alt="" class="rounded card-img-top">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="" class="btn btn-outline-dark me-2"><i class="fa-solid fa-user-group me-1"></i>20</a>
                                <a href="" class="btn btn-green me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" class="btn btn-red" data-bs-toggle="modal" data-bs-target="#eventowner-delete-event"><i class="fa-solid fa-trash-can"></i></a>
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

            <div class="col-4 mb-4">
                <div class="card shadow border-0">
                    <img src="{{ asset('images/event-test/festival_test.jpg') }}" alt="" class="rounded card-img-top">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="" class="btn btn-outline-dark me-2"><i class="fa-solid fa-user-group me-1"></i>20</a>
                                <a href="" class="btn btn-green me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" class="btn btn-red" data-bs-toggle="modal" data-bs-target="#eventowner-delete-event"><i class="fa-solid fa-trash-can"></i></a>
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

            <div class="col-4 mb-4">
                <div class="card shadow border-0">
                    <img src="{{ asset('images/event-test/IMG_7560.JPG') }}" alt="" class="rounded card-img-top">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="" class="btn btn-outline-dark me-2"><i class="fa-solid fa-user-group me-1"></i>20</a>
                                <a href="" class="btn btn-green me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" class="btn btn-red" data-bs-toggle="modal" data-bs-target="#eventowner-delete-event"><i class="fa-solid fa-trash-can"></i></a>
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

            <div class="col-4 mb-4">
                <div class="card shadow border-0">
                    <img src="{{ asset('images/event-test/IMG_7559.JPG') }}" alt="" class="rounded card-img-top">
                    <div class="card-body">
                        <div class="row align-items-center mb-3">
                            <div class="col-5">
                                <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <a href="" class="btn btn-outline-dark me-2"><i class="fa-solid fa-user-group me-1"></i>20</a>
                                <a href="" class="btn btn-green me-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" class="btn btn-red" data-bs-toggle="modal" data-bs-target="#eventowner-delete-event"><i class="fa-solid fa-trash-can"></i></a>
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
