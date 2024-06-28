<div class="modal fade" id="user-confirm-reservation">
    <div class="modal-dialog">
        <form action="#" method="post">
            @csrf
            @method('PATCH')
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
                        Event Name
                        <hr class="w-75 fw-bold" style="margin: 0 auto; border: 1px solid black;">
                    </div>
                    <div class="d-flex justify-content-center align-items-center flex-column w-100">
                        <div class="d-flex flex-row justify-content-between w-50 mb-2">
                             {{-- 合計金額 --}}
                            <div class="d-flex flex-row align-items-center">
                                <i class="fa-solid fa-yen-sign fa-xl me-3"></i>
                                <span>Total Price</span>
                            </div>
                            <div class="d-flex flex-row">
                                <span>5,500yen</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between w-50 mb-2">
                             {{-- 人数 --}}
                            <div class="d-flex flex-row align-items-center">
                                <i class="fa-solid fa-users fa-xl me-3"></i>
                                <span>People</span>
                            </div>
                            <div class="d-flex flex-row">
                                <span>2</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between w-50 mb-2">
                            {{-- 日付 --}}
                           <div class="d-flex flex-row align-items-center">
                                <i class="fa-solid fa-calendar-days fa-xl me-3"></i>
                                <span>Date</span>
                           </div>
                           <div class="d-flex flex-row">
                                <span>2024/6/15</span>
                           </div>
                       </div>
                       <div class="d-flex flex-row justify-content-between w-50 mb-2">
                            {{-- 時間 --}}
                            <div class="d-flex flex-row align-items-center">
                                <i class="fa-regular fa-clock fa-xl me-3"></i>
                                <span>Time</span>
                            </div>
                            <div class="d-flex flex-row">
                                <span>11:00</span>
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
