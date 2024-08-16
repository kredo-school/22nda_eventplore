@extends('layouts.app')

@section('title', 'Reset link')

@section('content')
    <div class="p-0 overflow-auto full-height">
        <div class="row m-0 d-flex justify-content-center align-items-stretch full-height">
            <div class="col-md-6 p-0 d-flex flex-column justify-content-center form-container">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="d-flex flex-column align-items-center my-4 text-center">
                        {{-- メールフォーム --}}

                        {{-- ロゴ --}}
                        <img src="{{ asset('images/eventplore-logo_final-nobg_480.png') }}" alt="logo" class="mt-5 mb-2 w-25">
                        {{-- タイトル --}}
                        <h2 class="h1 mb-2 text-align-center mb-3">Reset password</h2>

                        {{-- メール送信完了したら出るアラート --}}
                        @if(session('status'))
                        <div class="alert alert-success text-start my-4 p-3" role="alert">
                            <i class="fa-solid fa-circle-check"></i>
                            I've just sent you an email to reset your password. Please check your box!
                        </div>
                        @endif

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

                        <div class="d-flex flex-column mb-3 justify-content-center text-center mt-4">
                            <div class="d-flex justify-content-between mb-2">
                                <a href="{{ route('user.sign-in') }}" class="btn btn-yellow me-4">Back</a>
                                <button type="submit" class="btn btn-green px-3" style="width: auto;">
                                    Send link
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 p-0 img-container">
                <img src="{{ asset('images/sign-in/tengku-nadia-fz8_SONkBB8-unsplash.jpg') }}" alt="reset mail"  class="w-100 h-100 " style="object-fit: cover;">
            </div>
        </div>
    </div>
@endsection
