@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<div class="profile-container">
    <div class="background-image" style="background-image: url('{{ asset('images/profile/profileback.jpg') }}');"></div>
    <div class="content">
        <div class="card mx-auto w-50" style="min-width: 480px; min-height: 450px;">
            <div class="card-body text-center">
                <div class="position-absolute top-0 end-0 mt-2 me-5">
                    <div class="dropdown custom-dropdown-container">
                        <button class="btn btn-outline-light btn-sm custom-dropdown" type="button" id="dropdownPro" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fs-1 text-dark">&#8230;</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownPro">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#eventowner-profile-edit"><i class="fa-solid fa-pen-to-square"></i>&nbsp; Edit</a></li>
                            <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#eventowner-profile-delete"><i class="fa-solid fa-trash-can"></i>&nbsp; Delete</a></li>
                        </ul>
                    </div>
                </div>
                @include('event-owners.profile.modal.edit')
                @include('event-owners.profile.modal.delete')

                <div class="text-center mt-4">
                    <i class="fa-solid fa-circle-user fa-8x mb-2"></i>
                    <h1 class="card-title">John</h1>
                    <p class="text-muted">John Smith</p>
                </div>

                <div class="d-flex justify-content-center align-items-center mb-2">
                    <div class="content">
                        <a href="{{ route('event-list.show') }}" class="text-decoration-none">
                            <div class="card custom-bg border border-0 custom-card">
                                <div class="card-body">
                                    <p class="card-text">Events</p>
                                    <h5 class="card-title"><i class="fa-solid fa-list"></i>&nbsp; 24</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>1 Chome Marunouchi,<br>Chiyoda City, Tokyo 100-0005</span>
                    </div>
                    <div class="contact-item">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <span>123-456-789</span>
                    </div>
                    <div class="contact-item">
                        <i class="fa-regular fa-envelope"></i>
                        <span>Jhon@email.com</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
