@vite(['resources/js/showPassword.js'])
<div class="modal fade" id="user-delete-reservation{{ $reservation->id }}">
    <div class="modal-dialog">
        <form action="{{ route('user.reservation.destroy', $reservation->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="img-container modal-title w-100">
                        @if ($reservation->event->eventImages->isEmpty())
                            <img src="{{ asset('images/event-test/noimage.png') }}" alt="no image" class="w-100 rounded" style="object-fit: cover; height: 300px;">
                        @else
                            <img src="{{ $reservation->event->eventImages->first()->image }}" alt="{{ $reservation->event->event_name }}" class="w-100 rounded" style="object-fit: cover; height: 300px;">
                        @endif
                    </div>
                </div>
                <div class="modal-body" style="font-family: EB Garamond">
                    <p class="h5 text-center">Are you sure you want to cancel reservation of <b>{{ $reservation->event->event_name }}</b>?</p>
                    <p class="text-center">All you selected  reservation will be deleted and you won't be able to see it.
                        <br>This action cannot be undone.
                    </p>
                    <div class="w-75 mb-3 mx-auto">
                        <label for="password{{$reservation->id}}" class="d-flex justify-content-start"><b>Password</b></label>
                        <div class="input-group">
                            <input type="password" id="password{{$reservation->id}}" name="password" class="form-control" required>
                            <div class="input-group-text">
                                <i class="fa-solid fa-eye-slash toggle-password" onclick="togglePasswordVisibility({{ $reservation->id }})" style="cursor: pointer;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center border-0">
                    <button type="button" class="btn btn-outline-red me-4 py-2 px-4" data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-red py-2 px-3">Cancel Reservation</button>
                </div>
            </div>
        </form>
    </div>
</div>
