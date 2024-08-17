@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
@vite(['resources/js/delete_modal.js'])
<div class="p-0 overflow-auto full-height">
    <div class="row m-0 d-flex justify-content-center align-items-stretch full-height">
        <div class="col-md-6 p-0 d-flex flex-column justify-content-center form-container">

            <form action="{{ route('user.login') }}" method="POST" >
                @csrf

                <div class="d-flex flex-column align-items-center my-4 text-center">
                    <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="logo" class="mt-5 mb-2 w-25">
                    <h2 class="h1 mb-2 text-align-center">Sign In</h2>
                    <div class="d-flex justify-content-center mb-3">
                        <div class="w-100"><p>Don't you have an account yet ?&nbsp;<a href="{{ route('user.sign-up')}}" class="fw-bold text-decoration-none" style="color: #84947C">Sign Up</a></p></div>
                    </div>
                    {{-- If you don't sign in as a user, the event details page and favorites are redirected and show this page with error. --}}
                    @if (request()->has('message'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ request()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="d-flex justify-content-center flex-column w-50">
                        <div class="text-start mb-3">
                            <label for="email" class="form-label fw-bold mb-2">Email*</label>
                            <input id="email" type="email" class="form-control w-100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                            @error('email')
                                <span class="invalid-feedback text-start" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-center flex-column w-50">
                        <div class="text-start mb-3">
                            <label for="password" class="form-label fw-bold mb-2">Password*</label>
                            <div class="input-group">
                                <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control" placeholder="Password">
                                <div class="input-group-text d-flex justify-content-center align-items-center mb-0" style="width: 40px; height: 38px;">
                                    <i class="fa-solid fa-eye-slash toggle-password" onclick="togglePasswordVisibility()" style="cursor: pointer; "></i>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback text-start" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column mb-3 justify-content-center text-center">
                    <div class="d-flex justify-content-center mb-2">
                        <button type="submit" class="btn btn-yellow px-5" style="width: auto;">
                            {{ __('Sign in') }}
                        </button>
                    </div>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link mt-2" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <hr class="w-100 mx-auto mt-3" style="border: 1px solid #0C2C04">
                    <div class="d-flex justify-content-center">
                        <div class="w-100"><p>If you'd like to create event...&nbsp;<a href="{{ route('event-owner.sign-in') }}" style="color: #84947C">Event Owner sign-in</a></p></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6 p-0 img-container">
            <img src="{{ asset('images/sign-in/tengku-nadia-fz8_SONkBB8-unsplash.jpg') }}" alt="sign-in user photo" class="img-fluid h-100">
        </div>
    </div>
</div>
@endsection

