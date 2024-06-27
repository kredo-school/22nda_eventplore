@extends('layouts.app')

@section('title', 'Show reservations')

@section('content')

<link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">

<div class="container py-4">
    <div class="mb-4 d-grid mx-auto">
        <h2 class="h1 text-center mb-1"><i class="fa-solid fa-clipboard-list me-2"></i>Reservation list</h2>
    </div>

    <table class="table text-center shadow rounded-2 overflow-hidden mb-5">
        <thead>
            <tr>
                <th class="table-dg">#</th>
                <th class="table-dg">Event Name</th>
                <th class="table-dg">Price</th>
                <th class="table-dg">Participants</th>
                <th class="table-dg">Date</th>
                <th class="table-dg">Time</th>
                <th class="table-dg">Created At</th>
                <th class="table-dg">Updated At</th>
                <th class="table-dg"></th>
            </tr>
        </thead>

        <tbody>
            <tr class="table-yellow">
                <td>1</td>
                <td>Event Name</td>
                <td>5,000 yen</td>
                <td>2</td>
                <td>2024/06/15</td>
                <td>11:00</td>
                <td>2024/02/12</td>
                <td>2024/05/12</td>
                <td>
                    <button class="edit-btn border-0 me-2" data-bs-toggle="modal" data-bs-target="#user-edit-reservation">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#user-delete-reservation">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="table-yellow">2</td>
                <td class="table-yellow">Event Name</td>
                <td class="table-yellow">5,000 yen</td>
                <td class="table-yellow">2</td>
                <td class="table-yellow">2024/06/15</td>
                <td class="table-yellow">11:00</td>
                <td class="table-yellow">2024/02/12</td>
                <td class="table-yellow">2024/05/12</td>
                <td class="table-yellow">
                    <button class="edit-btn border-0 me-2" data-bs-toggle="modal" data-bs-target="#user-edit-reservation">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#user-delete-reservation">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <tr class="table-yellow">
                <td>3</td>
                <td>Event Name</td>
                <td>5,000 yen</td>
                <td>2</td>
                <td>2024/06/15</td>
                <td>11:00</td>
                <td>2024/02/12</td>
                <td>2024/05/12</td>
                <td>
                    <button class="edit-btn border-0 me-2" data-bs-toggle="modal" data-bs-target="#user-edit-reservation">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#user-delete-reservation">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="table-yellow">4</td>
                <td class="table-yellow">Event Name</td>
                <td class="table-yellow">5,000 yen</td>
                <td class="table-yellow">2</td>
                <td class="table-yellow">2024/06/15</td>
                <td class="table-yellow">11:00</td>
                <td class="table-yellow">2024/02/12</td>
                <td class="table-yellow">2024/05/12</td>
                <td class="table-yellow">
                    <button class="edit-btn border-0 me-2" data-bs-toggle="modal" data-bs-target="#user-edit-reservation">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#user-delete-reservation">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <tr class="table-yellow">
                <td>5</td>
                <td>Event Name</td>
                <td>5,000 yen</td>
                <td>2</td>
                <td>2024/06/15</td>
                <td>11:00</td>
                <td>2024/02/12</td>
                <td>2024/05/12</td>
                <td>
                    <button class="edit-btn border-0 me-2" data-bs-toggle="modal" data-bs-target="#user-edit-reservation">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#user-delete-reservation">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td class="table-yellow">6</td>
                <td class="table-yellow">Event Name</td>
                <td class="table-yellow">5,000 yen</td>
                <td class="table-yellow">2</td>
                <td class="table-yellow">2024/06/15</td>
                <td class="table-yellow">11:00</td>
                <td class="table-yellow">2024/02/12</td>
                <td class="table-yellow">2024/05/12</td>
                <td class="table-yellow">
                    <button class="edit-btn border-0 me-2" data-bs-toggle="modal" data-bs-target="#user-edit-reservation">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="trash-btn border-0" data-bs-toggle="modal" data-bs-target="#user-delete-reservation">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

</div>

@include('users.reservations.modal.delete')
@include('users.reservations.modal.edit')

@endsection

