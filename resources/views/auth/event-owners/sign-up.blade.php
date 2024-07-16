@extends('layouts.app')

@section('content')
<div class="p-0 overflow-auto" style="width: 100vw; height: 100vh;">
    <div class="row d-flex justify-content-center align-items-stretch w-100 h-100" style="width: 100vw; height: 100vh;">
        <div class="col-md-6 p-0 d-flex flex-column justify-content-center">
            <form method="POST" action="{{ route('event-owner.register') }}">
                @csrf

                <div class="d-flex flex-column align-items-center mt-3 text-center">
                    <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="logo" class="mt-5 mb-1 w-25">
                    <h2 class="h1 mb-2 text-align-center">Sign Up</h2>

                    <div class="d-flex flex-column align-items-center my-2">
                        <div class="w-75 text-start">
                            <div class="d-flex flex-wrap justify-content-between mb-1">
                                <div class="flex-fill me-2 mb-1" style="min-width: 45%;">
                                    <label for="username" class="form-label fw-bold mb-1">Username*</label>
                                    <input id="username" type="text" class="form-control" name="username" required autocomplete="username" autofocus placeholder="Username" style="border: 1px solid #84947C">

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="flex-fill mb-1" style="min-width: 45%;">
                                    <label for="password" class="form-label fw-bold mb-1">Password*</label>
                                    <div class="input-group mb-1 position-relative">
                                        <input type="password" class="form-control rounded" name="password" style="border: 1px solid #84947C" placeholder="Password">
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
                            <div class="d-flex flex-wrap justify-content-between mb-1">
                                <div class="flex-fill me-2 mb-1" style="min-width: 45%;">
                                    <label for="first-name" class="form-label fw-bold mb-1">First Name*</label>
                                    <input id="firstname" type="text" class="form-control" name="firstname" required autocomplete="firstname" autofocus placeholder="First name" style="border: 1px solid #84947C">

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="flex-fill mb-1" style="min-width: 45%;">
                                    <label for="last-name" class="form-label fw-bold mb-1">Last Name*</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" required autocomplete="lastname" autofocus placeholder="Last name" style="border: 1px solid #84947C">

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between mb-1">
                                <div class="flex-fill me-2 mb-1" style="min-width: 45%;">
                                    <label for="email" class="form-label fw-bold mb-1">Email*</label>
                                    <input type="email" name="email" id="email" class="form-control" required autocomplete="email" autofocus placeholder="email@eventplore.com" style="border: 1px solid #84947C">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="flex-fill mb-1" style="min-width: 45%;">
                                    <label for="phone_number" class="form-label fw-bold mb-1">Phone Number*</label>
                                    <input type="tel" name="phone_number" id="phone_number" class="form-control" required autocomplete="tel" autofocus placeholder="0xx-xxxx-xxxx" style="border: 1px solid #84947C">

                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex flex-wrap justify-content-between mb-1">
                                <div class="flex-fill w-100 mb-1">
                                    <label for="address" class="form-label fw-bold mb-1">Address*</label>
                                    <input type="text" name="address" id="address" class="form-control" required autocomplete="address" autofocus placeholder="1-1-1 Minato-ku, Tokyo, Japan" style="border: 1px solid #84947C">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="flex-fill w-100 my-1">
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

                {{-- <div class="d-flex mb-3 justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div> --}}

                <div class="d-flex mt-3 mb-5 justify-content-center text-center">
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
