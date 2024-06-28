@extends('layouts.app')

@section('title', 'Show Event')

@section('content')

<div class="container m-5">
    <button class="btn btn-green px-5 py-2 rounded-0" data-bs-toggle="modal" data-bs-target="#user-confirm-reservation">JOIN EVENT</button>
</div>
@include('users.reservations.modal.confirm')
@endsection
