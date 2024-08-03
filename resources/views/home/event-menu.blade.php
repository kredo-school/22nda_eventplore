@extends('layouts.app')

@section('title', 'Event Menu')

@section('content')
@vite(['resources/js/mapbox.js'])

    <link rel="stylesheet" href="{{ asset('css/show-event/event-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">

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
                    @forelse ($events as $event)
                        <div class="col-lg-6 mb-4">
                            <a href="{{ route('event.details.show', $event->id) }}" class="text-decoration-none">
                                {{-- event card --}}
                                <div class="card shadow border-0">
                                    @if ($event->eventImages->isEmpty())
                                        <img src="{{ asset('images/event-test/noimage.png') }}" alt="no image" class="rounded-top-only card-img-top card-img-sm">
                                    @else
                                        <img src="{{ $event->eventImages->first()->image }}" alt="{{ $event->event_name }}" class="rounded-top-only card-img-top card-img-sm">
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
                                                    <h4 class="h4 text-dark overflow_cut"><i class="fa-solid fa-star me-1"></i>{{ number_format($event->reviews->avg('star'), 1) }}</h4>
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
                        {{-- No events --}}
                        <div class="text-center mt-5">
                            <h3 class="h3">Sorry! No Results Found<i class="fa-regular fa-face-tired ms-2"></i></h3>
                            <p class="h5 text-muted mt-3">We can't find any event matching your search</p>
                            <a href="/" class="btn btn-green py-2 mt-3">Search again</a>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>

    {{-- map --}}
    <div>
        <div id="map"></div>
    </div>

@endsection
