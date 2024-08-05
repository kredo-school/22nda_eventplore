<div class="modal fade" id="eventowner-profile-edit">
    <div class="modal-dialog">
        <form action="{{ route('event-owners.profile.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header border-0 mt-3">
                    <div class="img-container w-100 d-flex justify-content-center align-items-center position-relative">
                        {{--　イベントオーナーのアイコン写真 --}}
                        @if (Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-circle" style="width: 128px; height: 128px;">
                        @else
                            <span class="d-flex align-items-center justify-content-center" style="position: relative;">
                                <i class="fa-solid fa-circle-user fa-8x"></i>
                            </span>
                        @endif
                        {{-- カメラアイコン→押すとファイル選択できる --}}
                        <label for="file-input" class="camera-icon">
                            <i class="fa-solid fa-camera-retro fa-xl"></i>
                        </label>
                        <input type="file" name="avatar" id="file-input" style="display: none;">
                    </div>
                </div>

                <div class="modal-body" style="font-family: EB Garamond">
                    <div class="d-flex justify-content-center align-items-center flex-column w-100">
                        {{-- User name --}}
                        <div class="row d-flex align-items-center justify-content-between w-75">
                            <div class="col-4">
                                <label for="username" class="form-label me-3">User Name</label>
                            </div>
                            <div class="d-flex col-8">
                                <input type="text" id="username" name="username" class="form-control input" value="{{ $user->username }}">
                            </div>
                        </div>
                        <hr class="w-100">
                        <div class="row d-flex align-items-center justify-content-between w-75">
                            {{-- Full name --}}
                            <div class="col-4">
                                <label for="name" class="form-label">Full Name</label>
                            </div>
                            <div class="d-flex col-8">
                                <input type="text" id="first-name" name="first_name" class="form-control me-2 input" placeho value="{{ $user->first_name }}">
                                <input type="text" id="last-name" name="last_name" class="form-control input" value="{{ $user->last_name }}">
                            </div>
                        </div>
                        <hr class="w-100">
                        <div class="row d-flex align-items-center justify-content-between w-75">
                            {{-- Address --}}
                            <div class="col-4">
                                <label for="address" class="form-label">Address</label>
                            </div>
                            <div class="d-flex col-8">
                                <input type="text" id="address" name="address" class="form-control me-2 input" value="{{ $user->address }}">
                            </div>
                        </div>
                        <hr class="w-100">
                        <div class="row d-flex align-items-center justify-content-between w-75">
                            {{-- Phone number --}}
                            <div class="col-4">
                               <label for="phone" class="form-label">Phone</label>
                            </div>
                            <div class="d-flex col-8">
                                <input type="number" id="phone-number" name="phone_number" class="form-control input" value="{{ $user->phone_number }}"">
                            </div>
                       </div>
                       <hr class="w-100">
                       <div class="row d-flex align-items-center justify-content-between w-75">
                        {{-- Email --}}
                            <div class="col-4">
                                <label for="email" class="form-label">Email</label>
                            </div>
                            <div class="d-flex col-8">
                                <input type="email" id="email" name="email" class="form-control input" value="{{ $user->email }}">
                            </div>
                       </div>
                    </div>

                </div>

                {{-- 確認ボタン --}}
                <div class="modal-footer justify-content-center border-0 m-3">
                    <button type="button" class="btn btn-yellow me-5 px-5 py-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-green px-5 py-2 ">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
