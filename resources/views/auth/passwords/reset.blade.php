@extends('layouts.app')

@section('title', 'Reset password')

@section('content')
@vite(['resources/js/delete_modal.js'])
<div class="p-0 overflow-auto full-height">
    <div class="row m-0 d-flex justify-content-center align-items-stretch full-height">
        <div class="col-md-6 p-0 d-flex flex-column justify-content-center form-container">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div class="d-flex flex-column align-items-center my-4 text-center">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="logo" class="mt-5 mb-2 w-25">
                    <h2 class="h1 mb-2 text-align-center mb-3">Reset password</h2>

                    <div class="d-flex justify-content-center flex-column w-50">
                        <div class="text-start mb-3">
                            <label for="email" class="form-label fw-bold mb-2">Email*</label>
                            <input id="email" type="email" class="form-control w-100 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                <div class="input-group-text d-flex justify-content-center align-items-center mb-0" style="width: 40px; height: 38px;">
                                    <i class="fa-solid fa-eye-slash toggle-password" style="cursor: pointer;"></i>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback text-start" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-center flex-column w-50">
                        <div class="text-start mb-3">
                            <label for="password-confirm" class="form-label fw-bold mb-2">Confirm Password*</label>
                            <div class="input-group">
                                <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Password" required>
                                <div class="input-group-text d-flex justify-content-center align-items-center mb-0" style="width: 40px; height: 38px;">
                                    <i class="fa-solid fa-eye-slash toggle-password" style="cursor: pointer;"></i>
                                </div>
                            </div>
                            @error('password_confirmation')
                                <span class="invalid-feedback text-start" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex flex-column mb-3 justify-content-center text-center mt-4">
                        <div class="d-flex justify-content-center mb-2">
                            <button type="submit" class="btn btn-green px-5" style="width: auto;">
                                Reset Password
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col p-0">
            <img src="{{ asset('images/sign-in/tengku-nadia-fz8_SONkBB8-unsplash.jpg') }}" alt="reset mail"  class="w-100 h-100" style="object-fit: cover;">
        </div>
    </div>
</div>
@endsection
