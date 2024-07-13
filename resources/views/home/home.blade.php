@extends('layouts.app')

@section('content')
@vite(['resources/js/mapbox.js'])
@vite(['resources/js/fullcalendar.js'])

    <link rel="stylesheet" href="{{ asset('css/show-event/home.css') }}">

    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.14/index.global.min.js'></script>

    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-5 overflow-auto sidebar">
            <form action="{{ route('event-menu') }}" method="get">

                {{-- calendar --}}
                <div class="ms-3 mt-4 mb-4 me-2" id="calendar"></div>
                <input type="hidden" id="date" name="date"> {{-- hidden input to store selected date --}}

                {{-- keyword --}}
                <div class="ms-3 me-2">
                    <label for="keyword" class="h4 form-label mb-2">Keyword</label>
                    <div class="input-group mb-2 position-relative">
                        <input id="keyword" type="text" class="form-control rounded" name="keyword">
                        <div class="d-flex h-100 end-0 p-2 position-absolute justify-content-center align-items-center">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                </div>

                {{-- area --}}
                <div class="mt-3 ms-3 me-2 mb-4">
                    <label for="area" class="h4 form-label mb-2">Area</label>
                    <select class="form-select me-2" id="area" name="area">
                        <option value="" hidden selected>Select Area</option>
                        @foreach ($areas as $area)
                            <option value="{{ $area->id }}">{{ $area->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- category --}}
                <div class="mt-3 ms-3">
                    <div class="h4 mb-4">Category</div>
                    <div class="row ms-3">
                        @foreach ($categories as $category)
                            <div class="col-lg-6 col-sm-12 col-6 form-check mb-3">
                                <input class="form-check-input green-check" type="checkbox" name="categories[]" id="{{ $category->name }}" value="{{ $category->id }}">
                                <label class="form-check-label ms-1 text-capitalize" for="{{ $category->name }}">{{ $category->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- search button --}}
                <div class="text-center mt-2 mb-4">
                    <input type="reset" class="btn btn-yellow ms-2 me-2 py-2 mb-1" value="Clear">
                    <button type="submit" class="btn btn-green ms-2 me-2 py-2">Search</button>
                </div>
            </form>
        </div>

        <div class="col-lg-9 col-md-8 col-sm-7 ps-0">
            {{-- map --}}
            <div>
                <div id="map"></div>
            </div>
        </div>
    </div>

@endsection
