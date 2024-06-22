@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-5">
            <form method="POST" action="">
                @csrf

                <div class="row justify-content-center my-5 text-center">
                    <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="logo" class="mt-5 mb-4 w-25">
                    <h2 class="h1 mb-2 text-align-center">Event Owner</h2>
                    <div class="row justify-content-center mb-3">
                        <div class="col-12"><p>Don't you have account yet?&nbsp;<span class="fw-bold" style="color: #84947C">Sign Up</span></p></div>
                    </div>

                    <div class="row justify-content-center mb-3">
                        <div class="col-md-4 text-start">
                            <label for="username" class="form-label fw-bold mb-2">Username*</label>
                            <div class="col-auto">
                                <input id="username" type="username" class="form-control" name="username" required autocomplete="username" autofocus placeholder="Username">
        
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-3">
                        <div class="col-md-4 text-start">
                            <label for="password" class="form-label fw-bold mb-2">Password*</label>
                            <div class="col-auto">
                                {{-- <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Password"><i class="fa-solid fa-eye-slash text-end"></i> --}}
                                <div class="input-group mb-3">
                                    {{-- <input type="text" class="form-control" placeholder="Password" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <i class="fa-solid fa-eye-slash text-end rounded border-start-none" style="padding-top: 10px; padding-left: 10px; padding-right: 10px; border: 1px solid #84947C"></i> --}}
                                    <input type="password" name="" id="password" reequired="">
                                    <label for="Password"></label>
                                    <span class="password-toggle-"><i class="fa-solid fa-eye-slash text-end"></i></span>
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

                <div class="row mb-5 justify-content-center text-center">
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
                </div>
            </form>
        </div>
        <div class="col-7">
            <img src="{{ asset('images/sign-in/product-school-ITF7fD0TSCY-unsplash.jpg') }}" alt="register event owner photo" class=" img-fluid h-100" style="margin-top: 50px; padding-right:50px">
        </div>
    </div>
</div>
@endsection
