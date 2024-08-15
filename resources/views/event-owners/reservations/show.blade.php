@extends('layouts.app')

@section('title', 'Reservation')

@section('content')
@vite(['resources/js/analysis-graph'])

<link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">

<div class="container py-4">
    <div class="mb-4 d-grid mx-auto">
        {{-- page title --}}
        <h2 class="h1 text-center mb-1"><i class="fa-solid fa-clipboard-list me-2"></i>Reservation list</h2>
    </div>

    <!-- delete success -->
    @if (session('success'))
        <h5 class="alert alert-success">{{ session('success') }}</h5>
    @endif
    <!-- delete error -->
    @if ($errors->has('password'))
        <h5 class="alert alert-danger">{{ $errors->first('password') }}</h5>
    @endif

    <div class="row">
        <div class="col-md-4 mb-5">
            <a href="{{ route('event.details.show', $event->id) }}" class="text-decoration-none">
                {{-- event card --}}
                <div class="card shadow border-0 w-100 me-2">
                    @php
                        $carouselId = 'carousel' . $event->id;
                    @endphp

                    @if ($event->eventImages->isEmpty())
                        <img src="{{ asset('images/event-test/noimage.png') }}" alt="no image" class="rounded-top-only card-img-top card-img-sm">
                    @elseif ($event->eventImages->count() == 1)
                        <img src="{{ $event->eventImages->first()->image }}" alt="{{ $event->event_name }}" class="rounded-top-only card-img-top card-img-sm">
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

        <div class="col-md-8 mb-3">
            {{-- total people & sales --}}
            <div class="d-grid mx-auto mb-3" style="width: 90%;">
                <div class="text-green">
                    <div class="d-flex justify-content-center align-items-center gx-1 mb-2">
                        <div class="d-flex justify-content-center h5" style="width: 10%;">
                            <i class="fa-solid fa-users fa-lg me-2"></i>
                        </div>
                        <div class="ms-1 text-start d-flex align-items-center" style="width: 55%;">
                            <h5 class="h5 mb-0">Total People</h5>
                        </div>
                        <div class="text-end" style="width: 35%;">
                            <h3 class="h3 mb-0">
                                @php
                                    $totalTickets = $reservations->sum('num_tickets');
                                @endphp
                                @if ($totalTickets == 0)
                                    0
                                @else
                                    {{ number_format($totalTickets) }}
                                @endif
                            </h3>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center align-items-center gx-1 mb-3">
                        <div class="d-flex justify-content-center h5" style="width: 10%;">
                            <i class="fa-solid fa-sack-dollar fa-lg me-2"></i>
                        </div>
                        <div class="ms-1 text-start" style="width: 55%;">
                            <h5 class="h5 mb-0">Total Sales</h5>
                        </div>
                        <div class="text-end" style="width: 35%;">
                            <h3 class="h3 mb-0">
                                @php
                                    $totalTickets = $reservations->sum('num_tickets');
                                @endphp
                                @if ($event->price == 0)
                                    Free
                                @elseif ($totalTickets == 0)
                                    ¥0
                                @else
                                    ¥{{ number_format($totalTickets * $event->price) }}
                                @endif
                            </h3>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gx-1 mb-2">
                        <div class="d-flex justify-content-center h5" style="width: 10%;">
                            <i class="fa-solid fa-magnifying-glass-chart fa-lg me-2"></i>
                        </div>
                        <div class="ms-1 text-start" style="width: 55%;">
                            <h5 class="h5 mb-0">Congestion Forecast</h5>
                        </div>
                    </div>
                    {{-- 混雑予想グラフ --}}
                    <div id="chart" class="p-3 card"></div>
                    <div id="time-slots-data" data-time-slots="{{ json_encode($timeSlots) }}"></div>
                    <div id="max-participants-data" data-max-participants="{{ $maxParticipants }}"></div>
                </div>
            </div>
        </div>

        {{-- reservation table --}}
        <div class="table-responsive">
            <table class="table text-center align-middle shadow rounded-2 overflow-hidden w-100 mt-0">
                <thead>
                    <tr>
                        <th class="table-dg">#</th>
                        <th class="table-dg">User Name</th>
                        <th class="table-dg">Ticket</th>
                        <th class="table-dg">Price</th>
                        <th class="table-dg">Date</th>
                        <th class="table-dg">Time</th>
                        <th class="table-dg">Created Date</th>
                        <th class="table-dg"></th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($reservations as $reservation)
                        <tr>
                            <td>{{ $loop->iteration + ($reservations->currentPage() - 1) * $reservations->perPage() }}</td>
                            <td>{{ $reservation->user->first_name }} {{ $reservation->user->last_name }}</td>
                            <td>{{ $reservation->num_tickets }}</td>
                            <td>
                                @if ($reservation->event->price == 0)
                                    Free
                                @else
                                    ¥{{ number_format($reservation->event->price * $reservation->num_tickets) }}
                                @endif
                            </td>
                            <td>{{ date('Y/m/d', strtotime($reservation->reservation_date)) }}</td>
                            <td>{{ date('H:i', strtotime($reservation->time)) }}</td>
                            <td>{{ date('Y/m/d', strtotime($reservation->created_at)) }}</td>
                            <td>
                                <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#eventowner-delete-reservation{{ $reservation->id }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                @include('event-owners.reservations.modal.delete', ['reservation' => $reservation])
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <h4 class="h4 my-3">No reservations yet.</h4>
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            {{ $reservations->links('vendor.pagination.event-pagination') }}
        </div>
    </div>
</div>

@endsection
