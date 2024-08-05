@extends('layouts.app')

@section('title', 'Guideline')

@section('content')

<link rel="stylesheet" href="{{ asset('css/guideline.css') }}">

<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-sm-8">
            <article class="">
                <h1 class="h2 art-title">Terms of Service</h1>
                <div class="art-body mt-4">
                    <p>These Terms of Service (hereinafter referred to as "Terms") set forth the conditions for the use of <strong>Eventplore</strong> (hereinafter referred to as "Service"). Please read these Terms carefully before using the Service. By using the Service, you agree to be bound by these Terms.</p>
                    <h2 class="h4">1. User Accounts</h2>
                    <p>
                        To use certain parts of the Service, you must register an account. Users are required to provide accurate and up-to-date information. You are responsible for managing your account information and must notify us immediately in case of any unauthorized use.
                    </p>
                    <div class="mt-4">
                        <h2 class="h4">2. Prohibited Activities</h2>
                        <p>
                            Users must not engage in the following activities when using the Service:
                            <br>(1) Activities that violate laws or public order and morals
                            <br>(2) Activities that infringe on the rights of other users or third parties
                            <br>(3) Activities that interfere with the operation of the Service
                            <br>(4) Providing false information
                        </p>
                    </div>
                    <div class="mt-4">
                        <h2 class="h4">3. Disclaimer</h2>
                        <p>
                            The Service does not guarantee the completeness, accuracy, usefulness, or safety of the information and functions provided. The company shall not be liable for any damages arising from the use of the Service.
                        </p>
                    </div>
                    <div class="mt-4">
                        <h2 class="h4">4. Amendments</h2>
                        <p>
                            The company may amend these Terms as necessary. The amended Terms shall become effective upon being posted on the Service.
                        </p>
                    </div>

                </div>

            </article>
        </div>
    </div>

    {{-- Privacy Policy --}}
    <div class="row justify-content-center mt-4">
        <div class="col-xs-12 col-sm-8">
            <article class="">
                <h1 class="h2 art-title">Privacy Policy</h1>
                <div class="art-body mt-4">
                    <h2 class="h4">1. Collection of Personal Information</h2>
                    <p>
                        The Service may collect personal information from users. The information collected may include names, email addresses, phone numbers, etc.
                    </p>
                    <div class="mt-4">
                        <h2 class="h4">2. Use of Information</h2>
                        <p>
                            The collected personal information will be used for the following purposes:
                            <br>(1) Providing and operating the Service
                            <br>(2) User support
                            <br>(3) Marketing and promotions
                        </p>
                    </div>
                    <div class="mt-4">
                        <h2 class="h4">3. Third-Party Disclosure</h2>
                        <p>
                            The Service will not disclose personal information to third parties without the user's consent, except as required by law.
                        </p>
                    </div>
                </div>

            </article>
        </div>
    </div>

</div>


@endsection
