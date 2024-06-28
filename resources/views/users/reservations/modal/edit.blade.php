<div class="modal fade" id="user-edit-reservation">
    <div class="modal-dialog">
        <form action="#" method="post">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header border-0 m-0">
                    <div class="img-container w-100">
                        <img src="{{ asset('images/fireworks.jpg') }}" alt="fireworks" class="w-100 rounded" style="object-fit: cover; height: 300px;">
                    </div>
                </div>

                <div class="modal-body " style="font-family: EB Garamond">
                    <div class="h3 modal-title text-center text-dark mb-3">
                        Event Name
                        <hr class="w-75 fw-bold" style="margin: 0 auto; border: 1px solid black;">
                    </div>
                    <div style="display: flex; flex-direction: column; align-items: center; ">
                        {{-- 人数 --}}
                        <div class="row ms-3 mb-3" style="display: flex; align-items: center;">
                            <div class="col-auto">
                                <label for="persons" class="col-form-label"><i class="fa-solid fa-users fa-xl"></i></label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="persons" name="persons" class="form-control rounded-pill" placeholder="1 person">
                            </div>
                            @error('persons')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- 日付 --}}
                        <div class="row ms-3 mb-3">
                            <div class="col-auto">
                                <label for="date" class="col-form-label me-1"><i class="fa-solid fa-calendar-days fa-xl"></i></label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="date" name="date" class="form-control rounded-pill" placeholder="2024/6/15">
                            </div>
                            @error('date')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                        {{-- 時間 --}}
                        <div class="row ms-3 mb-3">
                            <div class="col-auto">
                                <label for="time" class="col-form-label me-1"><i class="fa-regular fa-clock fa-xl"></i></label>
                            </div>
                            <div class="col-auto">
                                <input type="text" id="time" name="time" class="form-control rounded-pill" placeholder="11:00">
                            </div>
                            @error('time')
                                <p class="text-danger small">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <hr class="w-50" style="margin: 0 auto;">

                    {{-- 合計金額 --}}
                    <div class="text-center mt-3">
                        <i class="fa-solid fa-yen-sign fa-xl"></i>
                        <span class="mx-4">total price</span>
                        <span>5,000yen</span>
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
