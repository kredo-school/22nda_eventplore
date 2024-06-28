@extends('layouts.app')

@section('title', 'Event Menu')

@section('content')

<style>
input[type="checkbox"]:checked {
    background-color: #84947C !important;
    border-color: #84947C !important;
}

.form-control:focus, .form-select:focus {
    border-color: #84947C !important;
    box-shadow: inset 0 1px 1px #0C2C04, 0 0 8px #84947C !important;
}

.form-check-input:focus {
    border-color: #84947C !important;
    box-shadow: 0 0 0 0.15rem rgba(132, 148, 124, 0.5) !important;
}
</style>

    <link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">
    <link rel="stylesheet" href="{{ asset('css/show-event/event-menu.css') }}">

    <div class="row">
        <div class="col-3 overflow-auto map">
            <form action="" method="">
                {{-- calendar --}}
                <div class="mb-2">
                    <img src="{{ asset('images/event-test/calendar.png') }}" alt="calendar" class="calendar w-100 mt-3 ms-2">
                </div>
                <hr size="5" width="90%" class="mx-auto ms-4" noshade="">
                {{-- keyword search --}}
                <div class="ms-3">
                    <label for="keyword" class="form-label fw-bold mb-2">Keywords</label>
                    <div class="input-group mb-2 position-relative">
                        <input id="keyword" type="text" class="form-control rounded" name="keyword">
                        <div class="d-flex h-100 end-0 p-2 position-absolute justify-content-center align-items-center">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                    </div>
                </div>
                {{-- area search --}}
                <div class="mt-2 ms-3">
                    <label for="area" class="form-label fw-bold mb-2">Area</label>
                    <select class="form-select me-2" id="area">
                        <option hidden selected>Select Area</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
                {{-- categories --}}
                <div class="ms-3">
                    <div class="fw-bold mt-3 mb-3">Category</div>
                    <div class="row ms-3">
                        <div class="col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="business" id="business" style="transform: scale(1.5)">
                            <label class="form-check-label ms-1 text-capitalize" for="business">business</label>
                        </div>
                        <div class="col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="hobby" id="hobby" style="transform: scale(1.5)">
                            <label class="form-check-label ms-1 text-capitalize" for="hobby">hobby</label>
                        </div>
                        <div class="col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="movie" id="movie" style="transform: scale(1.5)">
                            <label class="form-check-label ms-1 text-capitalize" for="movie">movie</label>
                        </div>
                        <div class="col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="online" id="online" style="transform: scale(1.5)">
                            <label class="form-check-label ms-1 text-capitalize" for="online">online</label>
                        </div>
                        <div class="col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="food/drinks" id="food/drinks" style="transform: scale(1.5)">
                            <label class="form-check-label ms-1 text-capitalize" for="food/drinks">food/drinks</label>
                        </div>
                        <div class="col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="art" id="art" style="transform: scale(1.5)">
                            <label class="form-check-label ms-1 text-capitalize" for="art">art</label>
                        </div>
                        <div class="col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="music" id="music" style="transform: scale(1.5)">
                            <label class="form-check-label ms-1 text-capitalize" for="music">music</label>
                        </div>
                        <div class="col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="nature" id="nature" style="transform: scale(1.5)">
                            <label class="form-check-label ms-1 text-capitalize" for="nature">nature</label>
                        </div>
                        <div class="col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="festival" id="festival" style="transform: scale(1.5)">
                            <label class="form-check-label ms-1 text-capitalize" for="festival">festival</label>
                        </div>
                        <div class="col-6 form-check mb-3">
                            <input class="form-check-input green-check" type="checkbox" name="category" value="illumination" id="illumination" style="transform: scale(1.5)">
                            <label class="form-check-label ms-1 text-capitalize" for="illumination">illumination</label>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-2 mb-4">
                    <input type="reset" class="btn btn-yellow me-4 py-2" style="width: 35%" value="Clear">
                    <button type="submit" class="btn btn-green py-2" style="width: 35%">Search</button>
                </div>
            </form>
        </div>

        <div class="col-9 ps-0">
            {{-- map --}}
            <div class="p-0">
                <img src="{{ asset('images/event-test/map.png') }}" alt="map" class="map w-100">
            </div>
        </div>
    </div>

@endsection
