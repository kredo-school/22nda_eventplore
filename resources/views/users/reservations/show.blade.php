@extends('layouts.app')

@section('title', 'Show reservations')

@section('content')

<link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">

<div class="container py-4">
    {{-- title --}}
    <div class="mb-4 d-grid mx-auto">
        <h2 class="h1 text-center mb-1"><i class="fa-solid fa-clipboard-list me-2"></i>Reservation list</h2>
    </div>

    <!-- update/delete success -->
    @if (session('success'))
        <h5 class="alert alert-success">{{ session('success') }}</h5>
    @endif
    <!-- update error -->
    @if ($errors->has('num_tickets'))
        <h5 class="alert alert-danger">{{ $errors->first('num_tickets') }}</h5>
    @endif
    <!-- delete error -->
    @if ($errors->has('password'))
        <h5 class="alert alert-danger">{{ $errors->first('password') }}</h5>
    @endif

    {{-- reservation table --}}
    <div class="table-responsive">
        <table class="table text-center align-middle shadow rounded-2 overflow-hidden mb-5 w-100">
            <thead>
                <tr>
                    <th class="table-dg">#</th>
                    <th class="table-dg">Event Name</th>
                    <th class="table-dg">Tickets</th>
                    <th class="table-dg">Price</th>
                    <th class="table-dg">Date</th>
                    <th class="table-dg">Time</th>
                    <th class="table-dg">Created At</th>
                    <th class="table-dg">Updated At</th>
                    <th class="table-dg"></th>
                </tr>
            </thead>

            <tbody>
                @forelse ($reservations as $reservation)
                    <tr>
                        <td>{{ $loop->iteration + ($reservations->currentPage() - 1) * $reservations->perPage() }}</td>
                        <td>{{ $reservation->event->event_name }}</td>
                        <td>{{ $reservation->num_tickets }}</td>
                        <td>
                            @if ($reservation->event->price == 0)
                            Free
                        @else
                            ¥{{ number_format($reservation->event->price * $reservation->num_tickets) }}
                        @endif
                        </td>
                        <td>{{ date('Y/m/d', strtotime($reservation->reservation_date)) }}</td>
                        <td>{{ date('H:i', strtotime($reservation->time)) }}</td>
                        <td>{{ date('Y/m/d', strtotime($reservation->created_at)) }}</td>
                        <td>
                            @if (is_null($reservation->updated_at))
                                No update
                            @else
                                {{ date('Y/m/d', strtotime($reservation->updated_at)) }}
                            @endif
                        </td>
                        <td>
                            @if (now()->lessThanOrEqualTo($reservation->event->app_deadline))
                                <button class="edit-btn border-0 ms-1 me-1" data-bs-toggle="modal" data-bs-target="#user-edit-reservation{{ $reservation->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                @include('users.reservations.modal.edit')
                                <button class="trash-btn border-0 ms-1 me-1" data-bs-toggle="modal" data-bs-target="#user-delete-reservation{{ $reservation->id }}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                @include('users.reservations.modal.delete', ['reservation' => $reservation])
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            <h4 class="h4 my-3">No reservations yet.</h4>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $reservations->links('vendor.pagination.event-pagination') }}
    </div>
</div>

@endsection

