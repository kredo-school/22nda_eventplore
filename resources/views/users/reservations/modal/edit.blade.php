@vite(['resources/js/totalPrice.js'])
<div class="modal fade" id="user-edit-reservation{{ $reservation->id }}" data-price="{{ $reservation->event->price }}">
    <div class="modal-dialog">
        <form action="{{ route('user.reservation.update', $reservation->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header border-0 m-0">
                    <div class="img-container w-100">
                        @if ($reservation->event->eventImages->isEmpty())
                            <img src="{{ asset('images/event-test/noimage.png') }}" alt="no image" class="w-100 rounded" style="object-fit: cover; height: 300px;">
                        @else
                            <img src="{{ $reservation->event->eventImages->first()->image }}" alt="{{ $reservation->event->event_name }}" class="w-100 rounded" style="object-fit: cover; height: 300px;">
                        @endif
                    </div>
                </div>

                <div class="modal-body" style="font-family: EB Garamond">
                    <div class="h3 modal-title text-center text-dark mb-3">
                        {{ $reservation->event->event_name }}
                        <hr class="w-75 mt-1 fw-bold" style="margin: 0 auto; border: 1px solid black;">
                    </div>
                    <div class="w-50 mx-auto">
                        {{-- 価格 --}}
                        <div class="row ms-3 mb-3">
                            <div class="col-2 px-0">
                                <div class="col-form-label me-1"><i class="fa-solid fa-sack-dollar fa-xl"></i></div>
                            </div>
                            <div class="col-5 h6 text-dark my-auto">
                                Ticket Price
                            </div>
                            <div class="col-auto h6 text-dark my-auto">
                                ¥{{ number_format($reservation->event->price) }}
                            </div>
                        </div>
                        {{-- 人数 --}}
                        <div class="row ms-3 mb-3">
                            <div class="col-2 px-0">
                                <label for="num_tickets{{ $reservation->id }}" class="col-form-label me-1"><i class="fa-solid fa-users fa-xl"></i></label>
                            </div>
                            <div class="col-9">
                                <input type="number" id="num_tickets{{ $reservation->id }}" name="num_tickets" value="{{ $reservation->num_tickets }}" class="form-control rounded-pill text-center input" min="1"  max="{{ $reservation->maxAvailableTickets + $reservation->num_tickets }}" required>
                            </div>
                            @error('num_tickets')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- 日付 --}}
                        <div class="row ms-3 mb-3">
                            <div class="col-2 px-0">
                                <label for="reservation_date" class="col-form-label me-1"><i class="fa-solid fa-calendar-days fa-xl"></i></label>
                            </div>
                            <div class="col-9">
                                <input type="date" id="reservation_date" name="reservation_date" value="{{ $reservation->reservation_date }}" class="form-control rounded-pill text-center input" min="{{ $reservation->event->start_date }}" max="{{ $reservation->event->finish_date }}" required>
                            </div>
                            @error('reservation_date')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- 時間 --}}
                        <div class="row ms-3 mb-3">
                            <div class="col-2 px-0">
                                <label for="time{{ $reservation->id }}" class="col-form-label me-1"><i class="fa-regular fa-clock fa-xl"></i></label>
                            </div>
                            <div class="col-9">
                                <select id="time{{ $reservation->id }}" name="time" class="form-control rounded-pill text-center input">
                                    @php
                                        $startTime = strtotime($reservation->event->start_time);
                                        $finishTime = strtotime($reservation->event->finish_time);
                                        $adjustedFinishTime = strtotime('-1 hour', $finishTime);

                                        for ($time = $startTime; $time <= $adjustedFinishTime; $time = strtotime('+1 hour', $time)) {
                                            $formattedTime = date('H:i', $time);
                                            echo "<option value=\"{$formattedTime}\"" . ($reservation->time == $formattedTime ? ' selected' : '') . ">{$formattedTime}</option>";
                                        }
                                    @endphp
                                </select>
                            </div>
                            @error('time')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <hr class="w-50" style="margin: 0 auto;">

                    {{-- 合計金額 --}}
                    <div class="text-center mt-3">
                        <span class="h5 me-3">Total Price</span>
                        <span class="h5" id="total-price{{ $reservation->id }}">
                            ¥{{ number_format($reservation->event->price * $reservation->num_tickets) }}
                        </span>
                    </div>

                </div>
                <div class="modal-footer justify-content-center border-0">
                    <button type="button" class="btn btn-yellow me-5 px-5 py-2" data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-green px-5 py-2">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
