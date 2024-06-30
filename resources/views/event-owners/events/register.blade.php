@extends('layouts.app')

@section('title', 'Register Event')

@section('content')

{{-- CSS 読み込み --}}
<link rel="stylesheet" href="{{ asset('css/register-event/register-event.css') }}">

<div class="container-fluid d-flex justify-content-center p-0 position-relative">
    {{-- 背景画像 --}}
    <div class="background-image" style="background-image: url('{{ asset('images/event-register/manuel-cosentino-n--CMLApjfI-unsplash.jpg') }}');"></div>
    {{-- 入力フォーム --}}
    <div class="card my-5 w-50 text-align-center bg-light bg-opacity-75 border-0 shadow">
        <div class="card-body border-0 text-center py-4">
            <form method="POST" action="">
                @csrf
                <h2 class="h1">Register Event</h2>
                {{-- ステータスバー --}}
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-regular fa-calendar icon-md"></i>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-location-dot icon-md"></i>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-image icon-md"></i>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-circle-info icon-md"></i>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-up-right-from-square icon-md"></i>
                        </div>
                    </div>
                </div>
                {{-- STEP1 --}}
                {{-- 基本情報 --}}
                {{-- <div class="row justify-content-center mx-5 px-5">
                    <label for="form-label" class="fw-bold mb-2 text-start">Event Name*</label>
                    <div class="col-12 mb-3">
                        <input id="event_name" type="text" class="form-control" name="event_name" required autocomplete="event_name" autofocus placeholder="Event Name" style="border: 1px solid #84947C">
                        @error('event_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                {{-- Event Date --}}
                {{-- <div class="row justify-content-center mx-5 px-5">
                    <div class="col-3 mb-3 text-start">
                        <label for="start_date" class="fw-bold mb-2 text-start">Start Date*</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" required autocomplete="start_date" autofocus style="border: 1px solid #84947C">
                    </div>
                    <div class="col-3 mb-3 text-start">
                        <label for="finish_date" class="fw-bold mb-2 text-start">Finish Date*</label>
                        <input type="date" name="finish_date" id="finish_date" class="form-control" required autocomplete="finish_date" autofocus style="border: 1px solid #84947C">
                    </div>
                    <div class="col-3 mb-3 text-start">
                        <label for="start_time" class="fw-bold mb-2 text-start">Start Time*</label>
                        <input type="time" name="start_time" id="start_time" class="form-control" required autocomplete="start_time" autofocus style="border: 1px solid #84947C">
                    </div>
                    <div class="col-3 mb-3 text-start">
                        <label for="finish_time" class="fw-bold mb-2 text-start">Finish Time*</label>
                        <input type="time" name="finish_time" id="finish_time" class="form-control" required autocomplete="finish_time" autofocus style="border: 1px solid #84947C">
                    </div>
                </div> --}}
                {{-- Content --}}
                {{-- <div class="row justify-content-center mx-5 px-5">
                    <label for="form-label" class="fw-bold mb-2 text-start">Content*</label>
                    <div class="col-12 mb-3">
                        <textarea name="content" id="content" rows="3" class="form-control" required placeholder="Content"></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                {{-- History --}}
                {{-- <div class="row justify-content-center mx-5 px-5">
                    <label for="form-label" class="fw-bold mb-2 text-start">History*</label>
                    <div class="col-12 mb-3">
                        <textarea name="history" id="history" rows="3" class="form-control" required placeholder="History"></textarea>
                        @error('history')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                {{-- Category --}}
                {{-- <div class="row justify-content-center mx-5 px-5">
                    <div class="col-4 mb-3 text-start">
                        <label for="form-label" class="fw-bold mb-2 text-start">Category*</label>
                        <select class="form-select me-2 required">
                            <option selected>Category</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="col-4 mb-3 text-start">
                        <label for="form-label" class="fw-bold mb-2 text-start">Category</label>
                        <select class="form-select me-2">
                            <option selected>Category</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="col-4 mb-3 text-start">
                        <label for="form-label" class="fw-bold mb-2 text-start">Category</label>
                        <select class="form-select me-2">
                            <option selected>Category</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </div> --}}
                {{-- next button --}}
                {{-- <div class="row my-3 justify-content-center text-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-green px-5">
                            Next
                        </button>
                    </div>
                </div> --}}

                {{-- STEP2 --}}
                {{-- map --}}
                {{-- <div class="row justify-content-center mx-5 px-5 mb-3">
                    <label for="form-label" class="fw-bold mb-2 text-start">Address*</label>
                    <div class="col-12 mb-3">
                        <input id="address" type="text" class="form-control" name="address" required autocomplete="address" autofocus placeholder="1-1-1 Minatomirai Nishi-ku, Yokohama, Japan" style="border: 1px solid #84947C">
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                {{-- show map --}}
                {{-- <div class="row justify-content-center mx-5 px-5 mb-5">
                    <div class="img-container w-100">
                        <img src="{{ asset('images/event-register/map-sample.png') }}" alt="map" class="w-100 rounded" style="object-fit: cover; height: 300px;">
                    </div>
                </div> --}}
                {{-- buttons --}}
                {{-- <div class="row my-3 justify-content-center text-center">
                    <div class="col-md-8">
                        <div class="row justify-content-center p-0"> --}}
                            {{-- back button --}}
                            {{-- <div class="col-md-4">
                                <button type="submit" class="btn btn-yellow px-5">
                                    Back
                                </button>
                            </div> --}}
                            {{-- next button --}}
                            {{-- <div class="col-md-4">
                                <button type="submit" class="btn btn-green px-5">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- STEP3 --}}
                {{-- image --}}
                {{-- <div class="row justify-content-center mx-5 px-5">
                    <label for="form-label" class="fw-bold mb-2 text-start">Photo*</label>
                    <div class="col-12 mb-3">
                        <input type="file" name="photo" id="photor" class="form-control" required style="border: 1px solid #84947C">
                        <p class="text-start mt-1">Acceptable formats: jpeg, jpg, png, gif only. <br> Max : 5 images. Min : 1 image.</p>
                        @error('photo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                {{-- buttons --}}
                {{-- <div class="row my-3 justify-content-center text-center">
                    <div class="col-md-8">
                        <div class="row justify-content-center p-0"> --}}
                            {{-- back button --}}
                            {{-- <div class="col-md-4">
                                <button type="submit" class="btn btn-yellow px-5">
                                    Back
                                </button>
                            </div> --}}
                            {{-- next button --}}
                            {{-- <div class="col-md-4">
                                <button type="submit" class="btn btn-green px-5">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- STEP4 --}}
                {{-- local information --}}
                {{-- parking --}}
                {{-- <div class="row justify-content-center mx-5 px-5 mb-4">
                    <div class="col-3">
                        <i class="fa-brands fa-product-hunt icon-lg"></i>
                    </div>
                    <div class="col-6">
                        <input id="parking" type="text" class="form-control" name="parking" required autocomplete="parking" autofocus placeholder="Add parking information" style="border: 1px solid #84947C">
                        @error('parking')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                {{-- train --}}
                {{-- <div class="row justify-content-center mx-5 px-5 mb-4">
                    <div class="col-3">
                        <i class="fa-solid fa-train-subway icon-lg"></i>
                    </div>
                    <div class="col-6">
                        <input id="train" type="text" class="form-control" name="train" required autocomplete="train" autofocus placeholder="Add train/bus information" style="border: 1px solid #84947C">
                        @error('train')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                {{-- toilet --}}
                {{-- <div class="row justify-content-center mx-5 px-5 mb-4">
                    <div class="col-3">
                        <i class="fa-solid fa-restroom icon-lg"></i>
                    </div>
                    <div class="col-6">
                        <input id="toilet" type="text" class="form-control" name="toilet" required autocomplete="toilet" autofocus placeholder="Add toilet information" style="border: 1px solid #84947C">
                        @error('toilet')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                {{-- weather --}}
                {{-- <div class="row justify-content-center mx-5 px-5 mb-4">
                    <div class="col-3">
                        <i class="fa-solid fa-cloud-showers-heavy icon-lg"></i>
                    </div>
                    <div class="col-6">
                        <input id="weather" type="text" class="form-control" name="weather" required autocomplete="weather" autofocus placeholder="Add weather information" style="border: 1px solid #84947C">
                        @error('weather')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                {{-- category --}}
                {{-- <div class="row justify-content-center mx-5 px-5 mb-4">
                    <div class="col-3">
                        <select class="form-select me-2 required">
                            <option selected>Category</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <input id="weather" type="text" class="form-control" name="weather" required autocomplete="weather" autofocus placeholder="Add weather information" style="border: 1px solid #84947C">
                        @error('weather')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                {{-- buttons --}}
                {{-- <div class="row my-3 justify-content-center text-center mt-5">
                    <div class="col-md-8">
                        <div class="row justify-content-center p-0"> --}}
                            {{-- back button --}}
                            {{-- <div class="col-md-4">
                                <button type="submit" class="btn btn-yellow px-5">
                                    Back
                                </button>
                            </div> --}}
                            {{-- next button --}}
                            {{-- <div class="col-md-4">
                                <button type="submit" class="btn btn-green px-5">
                                    Next
                                </button>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- STEP5 --}}
                {{-- link --}}
                <div class="row justify-content-center mx-5 px-5 mb-3">
                    <div class="col-4 mb-3 text-start">
                        <i class="fab fa-facebook icon-md" style="color: #0C2C04"></i>
                        <input type="url" name="facebook" id="facebook" class="form-control" style="border: 1px solid #84947C">
                    </div>
                    <div class="col-4 mb-3 text-start">
                        <i class="fa-brands fa-x-twitter icon-md" style="color: #0C2C04"></i>
                        <input type="url" name="x" id="x" class="form-control" style="border: 1px solid #84947C">
                    </div>
                    <div class="col-4 mb-3 text-start">
                        <i class="fab fa-instagram icon-md" style="color: #0C2C04"></i>
                        <input type="url" name="instagram" id="instagram" class="form-control" style="border: 1px solid #84947C">
                    </div>
                </div>
                <div class="row justify-content-center mx-5 px-5">
                    <label for="form-label" class="fw-bold mb-2 text-start">Official Website</label>
                    <div class="col-12 mb-3">
                        <input type="url" name="instagram" id="instagram" class="form-control" style="border: 1px solid #84947C">
                        @error('link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- buttons --}}
                <div class="row my-3 justify-content-center text-center">
                    <div class="col-md-8">
                        <div class="row justify-content-center p-0">
                            {{-- back button --}}
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-yellow px-5">
                                    Back
                                </button>
                            </div>
                            {{-- next button --}}
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-green px-5">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection