@extends('layouts.app')

@section('title', 'Comments')

@section('content')

<link rel="stylesheet" href="{{ asset('css/show-event/show-event.css') }}">

<div class="container py-4">
    {{-- title --}}
    <div class="mb-4 d-grid mx-auto">
        <h2 class="h1 text-center mb-1"><i class="fa-solid fa-comments me-2"></i>Comments List</h2>
    </div>

    <!-- delete success -->
    @if (session('success'))
        <h5 class="alert alert-success">{{ session('success') }}</h5>
    @endif

    {{-- comments table --}}
    <div class="table-responsive">
        <table class="table text-center align-middle shadow rounded-2 overflow-hidden mb-5 w-100">
            <thead>
                <tr>
                    <th class="table-dg">#</th>
                    <th class="table-dg">Event Name</th>
                    <th class="table-dg">Comment</th>
                    <th class="table-dg">Rating</th>
                    <th class="table-dg">Created Date</th>
                    <th class="table-dg"></th>
                </tr>
            </thead>

            <tbody>
                @forelse ($reviews as $review)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="{{ route('event.details.show', $review->event_id) }}" class="text-dark">{{ $review->event->event_name }}</a>
                        </td>
                        <td>{{ Str::limit($review->comment, 80, '...') }}</td>
                        <td><i class="fa-solid fa-star star-color me-1"></i>{{ $review->star }}</td>
                        <td>{{ date('Y/m/d', strtotime($review->created_at)) }}</td>
                        <td>
                            <button class="trash-btn border-0 ms-1 me-1" data-bs-toggle="modal" data-bs-target="#user-delete-comment{{ $review->id }}">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                            @include('users.comments.modal.delete', ['review' => $review])
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <h4 class="h4 my-3">No reviews yet.</h4>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $reviews->links('vendor.pagination.event-pagination') }}
    </div>
</div>

@endsection
