@extends('layouts.app')

@section('content')
<div class="p-0 overflow-auto full-height">
    <div class="row d-flex justify-content-center align-items-stretch full-height">
        <div class="col-md-6 p-0 d-flex flex-column justify-content-center form-container">
            <form method="POST" action="">
                @csrf

                <div class="d-flex flex-column align-items-center my-4 text-center">
                    <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="logo" class="mt-5 mb-2 w-25">
                    <h2 class="h1 mb-2 text-align-center">Sign in</h2>
                    <div class="d-flex justify-content-center mb-3">
                        <div class="w-100"><p>Don't you have an account yet ?&nbsp;<a href="{{ route('user.sign-up')}}" class="fw-bold text-decoration-none" style="color: #84947C">Sign Up</a></p></div>
                    </div>

                    <div class="d-flex justify-content-center mb-3">
                        <div class="text-start">
                            <label for="email" class="form-label fw-bold mb-2">Email*</label>
                            <div class="mb-3">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" placeholder="Email" style="border: 1px solid #84947C">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mb-2">
                        <div class="text-start">
                            <label for="password" class="form-label fw-bold mb-2">Password*</label>
                            <div class="mb-3">
                                <div class="input-group mb-3 position-relative">
                                    <input type="password" class="form-control rounded" style="border: 1px solid #84947C" placeholder="Password">
                                    <div class="d-flex h-100 end-0 p-2 position-absolute justify-content-center align-items-center">
                                        <i class="fa-solid fa-eye-slash"></i>
                                    </div>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
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

