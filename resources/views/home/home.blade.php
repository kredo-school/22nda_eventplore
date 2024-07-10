@extends('layouts.app')

@section('title', 'Event Menu')

@section('content')
@vite(['resources/js/mapbox.js'])
    <link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show-event/event-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show-event/home.css') }}">

    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-5 overflow-auto map">
            <form action="" method="">
                {{-- calendar --}}
                <div class="mb-2">
                    <img src="{{ asset('images/event-test/calendar.png') }}" alt="calendar" class="calendar w-100 mt-3 ms-2">
                </div>
                <hr size="5" width="90%" class="mx-auto ms-4" noshade="">
                {{-- keyword search --}}
                <div class="ms-3">
                    <label for="keyword" class="h4 form-label mb-2">Keyword</label>
                    <div class="input-group mb-2 position-relative">
                        <input id="keyword" type="text" class="form-control rounded" name="keyword">
                        <div class="d-flex h-100 end-0 p-2 position-absolute justify-content-center align-items-center">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                </div>
                {{-- area search --}}
                <div class="mt-2 ms-3">
                    <label for="area" class="h4 form-label mb-2">Area</label>
                    <select class="form-select me-2" id="area">
                        <option hidden selected>Select Area</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
                {{-- categories --}}
                <div class="ms-3">
                    <div class="h4 mt-3 mb-3">Category</div>
                    <div class="row ms-3">
                        <div class="col-lg-6 col-sm-12 col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="business" id="business">
                            <label class="form-check-label ms-1 text-capitalize" for="business">business</label>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="hobby" id="hobby">
                            <label class="form-check-label ms-1 text-capitalize" for="hobby">hobby</label>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="movie" id="movie">
                            <label class="form-check-label ms-1 text-capitalize" for="movie">movie</label>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="online" id="online">
                            <label class="form-check-label ms-1 text-capitalize" for="online">online</label>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="food/drink" id="food/drink">
                            <label class="form-check-label ms-1 overflow-visible text-capitalize" for="food/drink">food/drink</label>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="art" id="art">
                            <label class="form-check-label ms-1 text-capitalize" for="art">art</label>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="music" id="music">
                            <label class="form-check-label ms-1 text-capitalize" for="music">music</label>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="nature" id="nature">
                            <label class="form-check-label ms-1 text-capitalize" for="nature">nature</label>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="festival" id="festival">
                            <label class="form-check-label ms-1 text-capitalize" for="festival">festival</label>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="illumination" id="illumination">
                            <label class="form-check-label ms-1 text-capitalize" for="illumination">illumination</label>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-2 mb-4">
                    <input type="reset" class="btn btn-yellow ms-2 me-2 py-2 mb-1" value="Clear">
                    <button type="submit" class="btn btn-green ms-2 me-2 py-2">Search</button>
                </div>
            </form>
        </div>

        <div class="col-lg-9 col-md-8 col-sm-7 ps-0">
            {{-- map --}}
            <div class="p-0">
                <div id="map" style="width: 100%; height: 600px;"/>
                {{-- <img src="{{ asset('images/event-test/map.png') }}" alt="map" class="map w-100"> --}}
            </div>
        </div>
    </div>

@endsection
