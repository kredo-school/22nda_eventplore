@extends('layouts.app')

@section('title', 'Event Owner/Sign-in')

@section('content')
<div class="p-0 overflow-auto full-height">
    <div class="row d-flex justify-content-center align-items-stretch full-height">
        <div class="col-md-6 p-0 d-flex flex-column justify-content-center form-container">
            <form action="{{ route('event-owner.login') }}" method="POST">
                @csrf

                <div class="d-flex flex-column align-items-center my-4 text-center">
                    <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="logo" class="mt-5 mb-2 w-25">
                    <h2 class="h1 mb-2 text-align-center">Event Owner</h2>
                    <div class="d-flex justify-content-center mb-3">
                        <div class="w-100"><p>Don't you have account yet?&nbsp;<a href="{{ route('event-owner.sign-up') }}" class="fw-bold text-decoration-none" style="color: #84947C">Sign Up</a></p></div>
                    </div>

                    <div class="d-flex justify-content-center flex-column w-50">
                        <div class="text-start mb-3">
                            <label for="email" class="form-label fw-bold mb-2">Email*</label>
                            <input id="email" type="email" class="form-control w-100 @error('email') is-invalid @enderror" name="email" required autocomplete="email" placeholder="Email">
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
                                <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control" placeholder="Password">
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
                        <button type="submit" class="btn btn-yellow px-5">
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
                        <div class="w-100"><p>If you'd like to sign-in as an user...&nbsp;<a href="{{ route('user.sign-in') }}" style="color: #84947C">User sign-in</a></p></div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col p-0">
            <img src="{{ asset('images/sign-in/product-school-ITF7fD0TSCY-unsplash.jpg') }}" alt="sign-in event owner photo" class="w-100 h-100" style="object-fit: cover;">
        </div>
    </div>
</div>
@endsection


{{-- 通常の切り替え --}}
<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.querySelector('.toggle-password');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
        }
    }
</script>
