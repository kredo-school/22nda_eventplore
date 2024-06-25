@extends('layouts.app')

@section('content')
<div class="container-fluid p-0" style="width: 100vw; height: 100vh;">
    <div class="d-flex justify-content-center w-100 h-100">
        <div class="w-50 p-0">
            <form method="POST" action="">
                @csrf

                <div class="row justify-content-center my-5 text-center">
                    <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="logo" class="mt-5 mb-2 w-25">
                    <h2 class="h1 mb-2 text-align-center">Sign in</h2>
                    <div class="row justify-content-center mb-3">
                        <div class="col-12"><p>Don't you have account yet?&nbsp;<a href="#" class="fw-bold text-decoration-none" style="color: #84947C">Sign Up</a></p></div>
                    </div>

                    <div class="row justify-content-center mb-3">
                        <div class="col-md-4 text-start">
                            <label for="username" class="form-label fw-bold mb-2">Username*</label>
                            <div class="col-auto">
                                <input id="username" type="username" class="form-control" name="username" required autocomplete="username" autofocus placeholder="Username" style="border: 1px solid #84947C">
        
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-2">
                        <div class="col-md-4 text-start">
                            <label for="password" class="form-label fw-bold mb-2">Password*</label>
                            <div class="col-auto">
                                <div class="input-group mb-3 position-relative">
                                    <input type="text" class="form-control rounded" style="border: 1px solid #84947C" placeholder="Password">
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


                {{-- <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                <div class="row mb-3 justify-content-center text-center">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-yellow px-5">
                            {{ __('Sign in') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                    <hr class="w-50 mt-5" style="border: 1px solid #0C2C04">
                    <div class="row mb-3">
                        <div class="col-12 justify-content-center"><p>If you'd like to create event...&nbsp;<a href="#" style="color: #84947C">Event Owner sign-in</a></p></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="w-50 p-0 text-align-center">
            <img src="{{ asset('images/sign-in/tengku-nadia-fz8_SONkBB8-unsplash.jpg') }}" alt="sign-in user photo" class="img-fluid w-100 h-100" style="object-fit: cover">
        </div>
    </div>
</div>
@endsection