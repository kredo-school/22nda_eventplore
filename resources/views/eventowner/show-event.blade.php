@extends('layouts.app')

@section('title', 'Show Event')

@section('content')

    <div class="container">
        <div class="ms-auto">
            <h2 class="h1"><i class="fa-solid fa-clipboard-list me-1"></i>Event list</h2>
            <a href="#" class="btn btn-green"><i class="fa-solid fa-circle-plus me-1"></i>Register Event</a>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <img src="" alt="" class="rounded">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h4>Event Title</h4>
                            </div>
                            <div class="col">
                                <a href="" class="btn btn-outline-dark"><i class="fa-solid fa-user-group me-1"></i>20</a>
                            </div>
                            <div class="col">
                                <a href="" class="btn btn-green"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" class="btn btn-red"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <i class="fa-solid fa-location-dot"></i>Location
                            </div>
                            <div class="col">
                                <div class="btn tag">Category1</div>
                            </div>
                            <div class="col">
                                <div class="btn tag">Category2</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <i class="fa-solid fa-calendar-days"></i>Date/Time
                            </div>
                            <div class="col">
                                <div class="btn tag">2024/10/10~11/11</div>
                            </div>
                            <div class="col">
                                <div class="btn tag">10:00~17:00</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection