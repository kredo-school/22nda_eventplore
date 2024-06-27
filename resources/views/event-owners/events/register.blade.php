@extends('layouts.app')

@section('title', 'Register Event')

@section('content')

<link rel="stylesheet" href="{{ asset('css/register-event/register-event.css') }}">

<div class="container-fluid d-flex justify-content-center p-0">
    {{-- 背景画像 --}}
    <div class="background-image position-absolute" style="background-image: url('{{ asset('images/event-register/manuel-cosentino-n--CMLApjfI-unsplash.jpg') }}'); width: 100%; height: 100%; background-size: cover; background-position: center;"></div>
    {{-- 入力フォーム --}}
    <div class="card my-5 w-50 text-align-center bg-light bg-opacity-75 border-0 shadow">
        <div class="card-body border-0 text-center py-4">
            <h2 class="h1">Register Event</h2>
            <form method="POST" action="">
                @csrf
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
                {{-- 基本情報 --}}
                <div class="row justify-content-center mx-5 px-5">
                    <label for="form-label" class="fw-bold mb-2 text-start">Event Name*</label>
                    <div class="col-12 mb-3">
                        <input id="event_name" type="text" class="form-control" name="event_name" required autocomplete="event_name" autofocus placeholder="Event Name" style="border: 1px solid #84947C">
                        @error('event_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- Event Date --}}
                <div class="row justify-content-center mx-5 px-5">
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
                </div>
                {{-- Content --}}
                <div class="row justify-content-center mx-5 px-5">
                    <label for="form-label" class="fw-bold mb-2 text-start">Content*</label>
                    <div class="col-12 mb-3">
                        <textarea name="content" id="content" rows="3" class="form-control" required placeholder="Content"></textarea>
                        @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- History --}}
                <div class="row justify-content-center mx-5 px-5">
                    <label for="form-label" class="fw-bold mb-2 text-start">History*</label>
                    <div class="col-12 mb-3">
                        <textarea name="history" id="history" rows="3" class="form-control" required placeholder="History"></textarea>
                        @error('history')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- Category --}}
                <div class="row justify-content-center mx-5 px-5">
                    <div class="col-4 mb-3 text-start">
                        <label for="form-label" class="fw-bold mb-2 text-start">Category*</label>
                        <select class="form-select me-2">
                            <option selected>Category</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="col-4 mb-3 text-start">
                        <label for="form-label" class="fw-bold mb-2 text-start">Category*</label>
                        <select class="form-select me-2">
                            <option selected>Category</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                    <div class="col-4 mb-3 text-start">
                        <label for="form-label" class="fw-bold mb-2 text-start">Category*</label>
                        <select class="form-select me-2">
                            <option selected>Category</option>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                        </select>
                    </div>
                </div>
                {{-- next button --}}
                <div class="row my-3 justify-content-center text-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-green px-5">
                            Next
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection