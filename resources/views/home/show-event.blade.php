@extends('layouts.app')

@section('title', 'Show Event')

@section('content')

<link rel="stylesheet" href="{{ asset('css/review.css') }}">

<div class="container m-5">
    <button class="btn btn-green px-5 py-2 rounded-0" data-bs-toggle="modal" data-bs-target="#user-confirm-reservation">JOIN EVENT</button>
</div>
@include('users.reservations.modal.confirm')

<hr>

<div class="contaner-fluid">

    <h2 class="ms-5">Reviews</h2>
    <div style="font-family: EB Garamond">

        <div class="align-items-center justify-content-center flex-row d-flex">
            {{--  レビューの星　--}}
            <div style="width: 400px; height: 200px; border: 1px solid #0C2C04" class="rounded d-flex flex-column justify-content-center align-items-center ms-5">
                <div class="mb-2">
                    <i class="fa-solid fa-star fa-3x"></i>
                    <span class="h1 ms-2 ">4.5</span>
                </div>
                <div class="text-center">
                    <p class="h6">( The average score customers evaluated .)</p>
                </div>
            </div>

            {{-- レビューの評価(グラフ) --}}
            <dl class="bar-chart-002 ms-4 w-25 rounded">
                <div>
                    <dt>5:</dt>
                    <dd><span style="width: 80%">80%</span></dd>
                </div>
                <div>
                    <dt>4:</dt>
                    <dd><span style="width: 10%">10%</span></dd>
                </div>
                <div>
                    <dt>3:</dt>
                    <dd><span style="width: 5%">5%</span></dd>
                </div>
                <div>
                    <dt>2:</dt>
                    <dd><span style="width: 3%"> 3%</span></dd>
                </div>
                <div>
                    <dt>1:</dt>
                    <dd><span style="width: 2%">2%</span></dd>
                </div>
            </dl>
        </div>
    </div>
    {{-- コメントが3件だけ見れる --}}
    <div class="d-flex justify-content-center mt-4 ">
        <div class="rounded p-2 me-3" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
            <div class="d-flex justify-content-start align-items-center">
                <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle m-2" style="width: 36px; height: 36px;">
                <span class="h5 ms-2 d-flex align-items-center">John Smith</span>
            </div>
            <i class="fa-solid fa-star"></i>
            <span class="me-2 h5">5.0</span>
            <div class="mt-2">
                <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
            </div>
        </div>
        <div class="rounded p-2 me-3" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
            <div class="d-flex justify-content-start align-items-center">
                <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle m-2" style="width: 36px; height: 36px;">
                <span class="h5 ms-2 d-flex align-items-center">John Smith</span>
            </div>
            <i class="fa-solid fa-star"></i>
            <span class="me-2 h5">5.0</span>
            <div class="mt-2">
                <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
            </div>
        </div>
        <div class="rounded p-2" style="border: 2px solid rgba(132, 148, 124, 0.5); height: 200px;">
            <div class="d-flex justify-content-start align-items-center">
                <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle m-2" style="width: 36px; height: 36px;">
                <span class="h5 ms-2 d-flex align-items-center">John Smith</span>
            </div>
            <i class="fa-solid fa-star"></i>
            <span class="me-2 h5">5.0</span>
            <div class="mt-2">
                <span>I was excited to watch fireworks!! I'm gonna go there next year. </span>
            </div>
        </div>
    </div>
    <div class="ms-5 my-5">
        <button class="btn btn-outline-dg" data-bs-toggle="modal" data-bs-target="#all-reviews-page">See all reviews(135)</button>
    </div>
    @include('home.modal.show-reviews')
</div>

@endsection
