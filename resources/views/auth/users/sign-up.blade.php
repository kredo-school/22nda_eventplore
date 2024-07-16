@extends('layouts.app')

@section('content')
<div class="p-0 overflow-auto" style="width: 100vw; height: 100vh;">
    <div class="row d-flex justify-content-center align-items-stretch w-100 h-100" style="width: 100vw; height: 100vh;">
        <div class="col-md-6 p-0 d-flex flex-column justify-content-center">
            <form method="post" action="{{ route('user.register') }}">
                @csrf

                <div class="d-flex flex-column align-items-center my-4 text-center">
                    <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="logo" class="mb-2 w-25">
                    <h2 class="h1 mb-2 text-align-center">Sign Up</h2>

                    <div class="d-flex flex-column align-items-center mt-3">
                        <div class="w-75 text-start">
                            <label for="username" class="form-label fw-bold mb-2">Username*</label>
                            <div class="mb-3">
                                <input id="username" type="text" class="form-control" name="username" required autocomplete="username" autofocus placeholder="Username" style="border: 1px solid #84947C">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="email" class="form-label fw-bold mb-2">Email*</label>
                            <div class="mb-3">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email" placeholder="Email" style="border: 1px solid #84947C">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="password" class="form-label fw-bold mb-2">Password*</label>
                            <div class="mb-3">
                                <div class="input-group mb-2 position-relative">
                                    <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control rounded" style="border: 1px solid #84947C" placeholder="Password">
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
                            <label for="first-name" class="form-label fw-bold mb-2">First Name*</label>
                            <div class="mb-3">
                                <input id="firstname" type="text" class="form-control" name="firstname" required autocomplete="firstname" autofocus placeholder="First name" style="border: 1px solid #84947C">

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="last-name" class="form-label fw-bold mb-2">Last Name*</label>
                            <div class="mb-3">
                                <input id="lastname" type="text" class="form-control" name="lastname" required autocomplete="lastname" autofocus placeholder="Last name" style="border: 1px solid #84947C">

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <label for="avatar" class="form-label fw-bold mb-1"><i class="fa-solid fa-circle-user"></i>Avatar</label>
                            <div class="mb-2">
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

                {{-- <div class="d-flex mb-3 justify-content-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div> --}}

                <div class="d-flex mb-3 justify-content-center text-center">
                    <button type="submit" class="btn btn-green px-5">
                        Sign Up
                    </button>
                </div>
            </form>
        </div>
        <div class="col p-0">
            <img src="{{ asset('images/sign-up/juan-manuel-nunez-mendez-EIo0V6oZJtQ-unsplash.jpg') }}" alt="register event owner photo" class="w-100 h-100" style="object-fit: cover;">
        </div>
    </div>
</div>
@endsection




