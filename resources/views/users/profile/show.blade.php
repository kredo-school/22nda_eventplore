@extends('layouts.app')

@section('content')
<div>
    <img src="{{ asset('images/profile/profileback.jpg') }}" class="object-fit" alt="Profile Picture">
    <div class="card mx-auto" style="max-width: 400px;">
        <div class="card-body text-center">
            <h3 class="card-title">John</h3>
            <p class="text-muted">John Smith</p>
            <div class="row mt-4">
                <div class="col-6">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">24</h5>
                    <p class="card-text">Events</p>
                    </div>
                </div>
                </div>
                <div class="col-6">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">5</h5>
                    <p class="card-text">Comments</p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
