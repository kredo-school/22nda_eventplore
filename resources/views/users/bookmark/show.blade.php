@extends('layouts.app')

@section('title', 'My bookmarks')
    
@section('content')

    <link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">

    <div class="container py-4">
        <div class="mb-4 d-grid mx-auto">
            {{-- page title --}}
            <h2 class="h1 text-center mb-3"><i class="fa-solid fa-bookmark me-2"></i>My wishlist</h2>
        </div>

        <!-- delete success -->
        @if (session('success'))
            <h5 class="alert alert-success">{{ session('success') }}</h5>
        @endif
        <!-- delete error -->
        @if ($errors->has('password'))
            <h5 class="alert alert-danger">{{ $errors->first('password') }}</h5>
        @endif

        {{-- event list --}}
        <div class="row">
            @if ($hasBookmarkedEvents)
                @foreach ($bookmarked_events as $event)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="{{ route('event.details.show', $event->id) }}" class="text-decoration-none">
                            {{-- event card --}}
                            <div class="card shadow border-0">
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
                                <div>
                                    @if ($event->isBookmarked())
                                        <form action="{{ route('user.bookmark.destroy', $event->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn text-danger">
                                                <i class="fa-solid fa-heart"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('user.bookmark.store', $event->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn text-danger">
                                                <i class="fa-regular fa-heart"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="row align-items-center mb-3">
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
                @endforeach
            @else
                {{-- No events --}}
                <div class="text-center mt-4">
                    <h3 class="h3">You have no favourites yet.</h3>
                </div>
            @endif
        </div>
    </div>

    {{ $bookmarked_events->links('vendor.pagination.event-pagination') }}

@endsection
