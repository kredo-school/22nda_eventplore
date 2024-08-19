@extends('layouts.app')

@section('title', 'Event Owner/Sign Up')

@section('content')
@vite(['resources/js/delete_modal.js'])
<div class="p-0 overflow-auto" style="width: 100vw; height: 100vh;">
    <div class="row m-0 d-flex justify-content-center align-items-stretch w-100 h-100" style="width: 100vw; height: 100vh;">
        <div class="col-md-6 px-0 py-4 d-flex flex-column justify-content-center form-container">
            <form method="POST" action="{{ route('event-owner.register') }}" enctype="multipart/form-data">
                @csrf

                <div class="d-flex flex-column align-items-center mt-3 text-center">
                    <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="logo" class="mb-2 w-25">
                    <h2 class="h1 mb-2 text-align-center">Sign Up</h2>

                    <div class="row justify-content-center my-3 w-75">
                        <div class="col-10 text-start">
                            <div class="row mb-2">
                                <div class="col mb-1 px-1">
                                    <label for="username" class="form-label fw-bold mb-1">Username*</label>
                                    <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username" style="border: 1px solid #84947C">
                    
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col mb-1 px-1">
                                    <label for="password" class="form-label fw-bold mb-1">Password*</label>
                                    <div class="input-group">
                                        <input type="password" id="password" name="password" autocomplete="new-password" class="form-control" style="border: 1px solid #84947C" placeholder="Password" required>
                                        <div class="input-group-text">
                                            <i class="fa-solid fa-eye-slash toggle-password" onclick="togglePasswordVisibility()" style="cursor: pointer;"></i>
                                        </div>
                                    </div>
                                    
                                    @error('password')
                                        <span class="invalid-feedback text-start" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 mb-1 px-1">
                                    <label for="firstname" class="form-label fw-bold mb-1">First Name*</label>
                                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" required autocomplete="given-name" placeholder="First name" style="border: 1px solid #84947C">
                    
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6 mb-1 px-1">
                                    <label for="lastname" class="form-label fw-bold mb-1">Last Name*</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autocomplete="family-name" placeholder="Last name" style="border: 1px solid #84947C">
                    
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-6 mb-1 px-1">
                                    <label for="email" class="form-label fw-bold mb-1">Email*</label>
                                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autocomplete="email" placeholder="email@eventplore.com" style="border: 1px solid #84947C">
                    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6 mb-1 px-1">
                                    <label for="phone_number" class="form-label fw-bold mb-1">Phone Number*</label>
                                    <input type="tel" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}" required autocomplete="tel" placeholder="0xx-xxxx-xxxx" style="border: 1px solid #84947C">
                    
                                    @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col mb-1 px-1">
                                    <label for="address" class="form-label fw-bold mb-1">Address*</label>
                                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required autocomplete="address" placeholder="1-1-1 Minato-ku, Tokyo, Japan" style="border: 1px solid #84947C">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col mb-1 px-1">
                                    <label for="avatar" class="form-label fw-bold mb-1"><i class="fa-solid fa-circle-user"></i>Avatar</label>
                                    <input type="file" name="avatar" id="avatar" class="form-control" style="border: 1px solid #84947C">
                                    @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3 justify-content-center text-center w-100 mt-3">
                    <a href="{{ route('event-owner.sign-in') }}" class="btn btn-yellow me-5 px-4">Back</a>
                    <button type="submit" class="btn btn-green px-5">
                        Sign Up
                    </button>
                </div>

            </form>
        </div>
        <div class="col p-0">
            <img src="{{ asset('images/sign-up/redd-f-Bxzrd0p6yOM-unsplash.jpg') }}" alt="register event owner photo" class="w-100 h-100" style="object-fit: cover;">
        </div>
    </div>
</div>
@endsection


