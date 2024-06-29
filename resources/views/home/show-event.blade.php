@extends('layouts.app')

@section('title', 'Show Event')

@section('content')

<link rel="stylesheet" href="{{ asset('css/review.css') }}">

<div class="container m-5">
    <button class="btn btn-green px-5 py-2 rounded-0" data-bs-toggle="modal" data-bs-target="#user-confirm-reservation">JOIN EVENT</button>
</div>
@include('users.reservations.modal.confirm')

<div class="m-5">
    <button class="btn btn-outline-dg" data-bs-toggle="modal" data-bs-target="#all-reviews-page">See all reviews(135)</button>
</div>
@include('home.modal.show-reviews')

@endsection
