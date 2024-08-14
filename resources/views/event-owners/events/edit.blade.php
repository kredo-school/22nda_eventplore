@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')

{{-- CSS 読み込み --}}
<link rel="stylesheet" href="{{ asset('css/edit-event/edit-event.css') }}">

<!-- Scripts -->
@vite(['resources/js/edit-event.js'])

<div id="multi-step-form" class="container-fluid d-flex justify-content-center p-0 position-relative back h-100">
    <div class="background-image" style="background-image: url('{{ asset('images/event-register/sorasak-_UIN-pFfJ7c-unsplash.jpg') }}');"></div>
    {{-- 入力フォーム --}}
    <div class="card my-5 w-50 text-align-center bg-light bg-opacity-75 border-0 shadow" style="min-width: 360px; height: fit-content;">
        <div class="border-0 text-center py-4">
            <form method="POST" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <h2 class="h1">Edit Event</h2>
                {{-- ステータスバー --}}
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-regular fa-calendar icon-md-active" id="icon1"></i>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-users icon-md" id="icon2"></i>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-icons icon-md" id="icon3"></i>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-location-dot icon-md" id="icon4"></i>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-image icon-md" id="icon5"></i>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-circle-info icon-md" id="icon6"></i>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-icon">
                            <i class="fa-solid fa-up-right-from-square icon-md" id="icon7"></i>
                        </div>
                    </div>
                </div>
                {{-- STEP1 --}}
                <div id="step1" class="">
                    @include('event-owners.events.partials-edit.step1')
                </div>
                {{-- STEP2 --}}
                <div id="step2" class="d-none">
                    @include('event-owners.events.partials-edit.step2')
                </div>
                {{-- STEP3 --}}
                <div id="step3" class="d-none">
                    @include('event-owners.events.partials-edit.step3')
                </div>
                {{-- STEP4 --}}
                <div id="step4" class="d-none">
                    @include('event-owners.events.partials-edit.step4')
                </div>
                {{-- STEP5 --}}
                <div id="step5" class="d-none">
                    @include('event-owners.events.partials-edit.step5')
                </div>
                {{-- STEP6 --}}
                <div id="step6" class="d-none">
                    @include('event-owners.events.partials-edit.step6')
                </div>
                {{-- STEP7 --}}
                <div id="step7" class="d-none">
                    @include('event-owners.events.partials-edit.step7')
                </div>
                {{-- buttons --}}
                <div class="row my-3 justify-content-center text-center">
                    <div class="col-8">
                        <div class="row justify-content-center p-0">
                            {{-- back button --}}
                            <div id="back-button" class="col-4 d-none">
                                <button type="button" class="btn btn-yellow w-100" onclick="window.back()">
                                    Back
                                </button>
                            </div>
                            {{-- next button --}}
                            <div id="next-button" class="col-4">
                                <button type="button" class="btn btn-green w-100" onclick="window.next()">
                                    Next
                                </button>
                            </div>
                            {{-- submit button --}}
                            <div id="submit-button" class="col-4 d-none">
                                <button type="submit" class="btn btn-green w-100">
                                    Update
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