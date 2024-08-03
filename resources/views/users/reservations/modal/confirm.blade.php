@vite(['resources/js/eventDetails'])
<div class="modal fade" id="user-confirm-reservation">
    <div class="modal-dialog">
        <form action="{{ route('user.reservation.store') }}" method="post">
            @csrf
            <input type="hidden" name="eventId" value="{{ $event->id }}">
            <div class="modal-content">
                <div class="modal-header border-0 m-0">
                    <div class="img-container w-100">
                        {{-- 花火の写真 --}}
                        <img src="{{ asset('images/fireworks.jpg') }}" alt="fireworks" class="w-100 rounded" style="object-fit: cover; height: 300px;">
                    </div>
                </div>

                <div class="modal-body " style="font-family: EB Garamond">
                    <div class="h3 modal-title text-center text-dark mb-3">
                        {{-- イベントタイトル --}}
                        {{ $event->event_name }}
                        <hr class="w-75 fw-bold" style="margin: 0 auto; border: 1px solid black;">
                    </div>
                    <div class="d-flex justify-content-center align-items-center flex-column w-100">
                        <div class="d-flex flex-row justify-content-between w-50 mb-2">
                             {{-- 合計金額 --}}
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex justify-content-center align-items-center" style="height: 25px; width: 25px;">
                                    <i class="fa-solid fa-yen-sign d-flex justify-content-center align-items-center h-100"></i>
                                </div>
                                <span>Total Price</span>
                            </div>
                            <div class="d-flex flex-row">
                                <span id="modalTotalPrice"></span> yen
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between w-50 mb-2">
                             {{-- 人数 --}}
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex justify-content-center align-items-center" style="height: 25px; width: 25px;">
                                    <i class="fa-solid fa-users d-flex justify-content-center align-items-center h-100"></i>
                                </div>
                                <span>People</span>
                            </div>
                            <div class="d-flex flex-row">
                                <span id="modalNumTickets"></span>
                                <input type="hidden" name="num_tickets" id="num_tickets">
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between w-50 mb-2">
                            {{-- 日付 --}}
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex justify-content-center align-items-center" style="height: 25px; width: 25px;">
                                    <i class="fa-solid fa-calendar-days d-flex justify-content-center align-items-center h-100"></i>
                                </div>
                                <span>Date</span>
                            </div>
                            <div class="d-flex flex-row">
                                <span id="modalDate"></span>
                                <input type="hidden" name="event_date" id="event_date">
                            </div>
                       </div>
                       <div class="d-flex flex-row justify-content-between w-50 mb-2">
                            {{-- 時間 --}}
                            <div class="d-flex flex-row align-items-center">
                                <div class="d-flex justify-content-center align-items-center" style="height: 25px; width: 25px;">
                                    <i class="fa-solid fa-clock d-flex justify-content-center align-items-center h-100"></i>
                                </div>
                                <span>Time</span>
                            </div>
                            <div class="d-flex flex-row">
                                <span id="modalTime"></span>
                                <input type="hidden" name="event_time" id="event_time">
                            </div>
                       </div>
                   </div>
                </div>

                {{-- 確認ボタン --}}
                <div class="modal-footer justify-content-center border-0">
                    <button type="button" class="btn btn-yellow me-5 px-5 py-2" data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-green px-5 py-2">Reserve</button>
                </div>
            </div>
        </form>
    </div>
</div>
