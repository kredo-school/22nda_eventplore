@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<div class="profile-container">
    <div class="background-image" style="background-image: url('{{ asset('images/profile/profileback.jpg') }}');"></div>
    <div class="content">
        <div class="card mx-auto" style="min-width: 480px; min-height: 450px;">
            <div class="card-body text-center">
                <div class="position-absolute top-0 end-0 mt-2 me-5">
                    <div class="dropdown custom-dropdown-container">
                        <button class="btn btn-outline-light btn-sm custom-dropdown" type="button" id="dropdownPro" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fs-1 text-dark">&#8230;</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownPro">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#user-profile-edit"><i class="fa-solid fa-pen-to-square"></i>&nbsp; Edit</a></li>
                            <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#user-profile-delete"><i class="fa-solid fa-trash-can"></i>&nbsp; Delete</a></li>
                        </ul>
                    </div>
                </div>
                @include('users.profile.modal.delete')
                @include('users.profile.modal.edit')

                <div class="d-flex flex-column align-items-center justify-content-center">
                @if (Auth::user()->avatar)
                    <img src="{{ Auth::user()->avatar }}" alt="" class="mb-2 rounded-circle avatar-lg">
                @else
                    <span class="d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-circle-user fa-8x mb-2"></i>
                    </span>
                @endif
                    <h1 class="card-title mb-0">{{ $user->username }}</h1>
                    <p class="text-muted fs-4 mb-3">{{ $user->first_name }} {{ $user->last_name }}</p>
                </div>

                <div class="row mb-2">
                    <div class="col-6">
                        <div class="content">
                            <a href="{{ route('user.reservation.show') }}" class="text-decoration-none">
                                <div class="card custom-bg border border-0 custom-card">
                                    <div class="card-body">
                                        <p class="card-text">Events</p>
                                        <h5 class="card-title"><i class="fa-solid fa-list"></i>&nbsp; {{ $reservationCount }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="content">
                            <a href="{{ route('comment') }}" class="text-decoration-none">
                                <div class="card custom-bg border border-0 custom-card">
                                    <div class="card-body">
                                        <p class="card-text">Comments</p>
                                        <h5 class="card-title"><i class="fa-regular fa-comment"></i>&nbsp; {{ $commentCount }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
