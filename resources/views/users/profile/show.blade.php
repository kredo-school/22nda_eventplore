@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">

<div class="profile-container">
    <div class="background-image" style="background-image: url('{{ asset('images/profile/profileback.jpg') }}');"></div>
    <div class="content">
        <div class="card mx-auto">
            <div class="card-body text-center" style="width: 600px; height: 450px;">
                <div class="position-absolute top-0 end-0 mt-2 me-2">
                    <div class="dropdown">
                        <button class="btn btn-outline-light btn-sm custom-dropdown" type="button" id="dropdownPro" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="fs-4 text-dark">&#8230;</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownPro">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#user-profile-edit"><i class="fa-solid fa-pen-to-square"></i>&nbsp; Edit</a></li>
                            <li><a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#user-profile-delete"><i class="fa-solid fa-trash-can"></i>&nbsp; Delete</a></li>
                        </ul>
                    </div>
                </div>

                <div class="text-center">
                    <i class="fa-solid fa-circle-user fa-8x mb-2"></i>
                    <h1 class="card-title">John</h1>
                    <p class="text-muted">John Smith</p>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="content">
                            <a href="#" class="text-decoration-none">
                                <div class="card custom-bg border border-0 custom-card">
                                    <div class="card-body">
                                        <p class="card-text">Events</p>
                                        <h5 class="card-title"><i class="fa-solid fa-list"></i>&nbsp; 24</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="content">
                            <a href="#" class="text-decoration-none">
                                <div class="card custom-bg border border-0 custom-card">
                                    <div class="card-body">
                                        <p class="card-text">Comments</p>
                                        <h5 class="card-title"><i class="fa-regular fa-comment"></i>&nbsp; 5</h5>
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
