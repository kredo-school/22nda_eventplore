@extends('layouts.app')

@section('title', 'Show reservations')

@section('content')
{{-- modal作るためにざっくり作りました。レイアウト好きに変更してください --}}
    <div class="row">
        <div class="col-auto ms-5">
            <button class="btn-red border-0 rounded" data-bs-toggle="modal" data-bs-target="#eventowner-delete-reservation">
                <i class="fa-solid fa-trash-can"></i>
            </button>
        </div>
    </div>
    @include('event-owners.reservations.modal.delete')


@endsection
