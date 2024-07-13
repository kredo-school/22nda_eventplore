@extends('layouts.app')

@section('title', 'Show reservations')

@section('content')

<link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">

<div class="container py-4">
    <div class="mb-4 d-grid mx-auto">
        {{-- page title --}}
        <h2 class="h1 text-center mb-1"><i class="fa-solid fa-clipboard-list me-2"></i>Reservation list</h2>
    </div>
    <div class="row">
        <div class="col-md-4 me-2 mb-4">
            {{-- event list --}}
            <div class="card shadow border-0">
                <a href=""><img src="{{ asset('images/event-test/event1.jpeg') }}" alt="" class="rounded-top-only card-img-top"></a>
                <div class="card-body">
                    <div class="row align-items-center mb-2">
                        {{-- event title --}}
                        <div class="col-5">
                            <h4><a href="#" class="text-dark text-decoration-none">Event Title</a></h4>
                        </div>
                        {{-- review --}}
                        <div class="col d-flex justify-content-end me-3">
                            <a href="" class="h4 text-dark text-decoration-none"><i class="fa-solid fa-star me-2"></i>4.5</a>
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

            {{-- total people & sales --}}
            <div class="w-75 mt-4 d-grid mx-auto">
                <div class="text-green">
                    <div class="row align-items-center gx-1 mb-2">
                        <div class="col h5">
                            <i class="fa-solid fa-users fa-lg me-2"></i>Total People
                        </div>
                        <div class="col h2 text-end ms-3">
                            20,000
                        </div>
                    </div>
                    <div class="row align-items-center gx-1">
                        <div class="col h5">
                            <i class="fa-solid fa-sack-dollar fa-lg ms-1 me-2"></i>Total Sales
                        </div>
                        <div class="col h2 text-end ms-3">
                            ¥1,000,000
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- reservation table --}}
        <div class="col">
            <table class="table text-center align-middle shadow rounded-2 overflow-hidden mb-5">
                <thead>
                    <tr>
                        <th class="table-dg">#</th>
                        <th class="table-dg">User Name</th>
                        <th class="table-dg">Tickets</th>
                        <th class="table-dg">Price</th>
                        <th class="table-dg">Date</th>
                        <th class="table-dg">Time</th>
                        <th class="table-dg">Created At</th>
                        <th class="table-dg"></th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="table-yellow">
                        <td>1</td>
                        <td>User Name</td>
                        <td>5</td>
                        <td>5,000 yen</td>
                        <td>2024/06/15</td>
                        <td>11:00</td>
                        <td>2024/06/11</td>
                        <td>
                            <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#eventowner-delete-reservation">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-yellow">2</td>
                        <td class="table-yellow">User Name</td>
                        <td class="table-yellow">5</td>
                        <td class="table-yellow">5,000 yen</td>
                        <td class="table-yellow">2024/06/15</td>
                        <td class="table-yellow">11:00</td>
                        <td class="table-yellow">2024/06/11</td>
                        <td class="table-yellow">
                            <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#eventowner-delete-reservation">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="table-yellow">
                        <td>3</td>
                        <td>User Name</td>
                        <td>5</td>
                        <td>5,000 yen</td>
                        <td>2024/06/15</td>
                        <td>11:00</td>
                        <td>2024/06/11</td>
                        <td>
                            <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#eventowner-delete-reservation">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-yellow">4</td>
                        <td class="table-yellow">User Name</td>
                        <td class="table-yellow">5</td>
                        <td class="table-yellow">5,000 yen</td>
                        <td class="table-yellow">2024/06/15</td>
                        <td class="table-yellow">11:00</td>
                        <td class="table-yellow">2024/06/11</td>
                        <td class="table-yellow">
                            <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#eventowner-delete-reservation">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="table-yellow">
                        <td>5</td>
                        <td>User Name</td>
                        <td>5</td>
                        <td>5,000 yen</td>
                        <td>2024/06/15</td>
                        <td>11:00</td>
                        <td>2024/06/11</td>
                        <td>
                            <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#eventowner-delete-reservation">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td class="table-yellow">6</td>
                        <td class="table-yellow">User Name</td>
                        <td class="table-yellow">5</td>
                        <td class="table-yellow">5,000 yen</td>
                        <td class="table-yellow">2024/06/15</td>
                        <td class="table-yellow">11:00</td>
                        <td class="table-yellow">2024/06/11</td>
                        <td class="table-yellow">
                            <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#eventowner-delete-reservation">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

@include('event-owners.reservations.modal.delete')

@endsection
