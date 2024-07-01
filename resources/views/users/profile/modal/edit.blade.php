<div class="modal fade" id="user-profile-edit">
    <div class="modal-dialog">
        <form action="#" method="post">
            @csrf
            @method('PATCH')
            <div class="modal-content">
                <div class="modal-header border-0 mt-3">
                    <div class="img-container w-100" >
                        {{--　イベントオーナーのアイコン写真 --}}
                        <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle" style="width: 128px; height: 128px;">
                        {{-- <i class="fa-solid fa-circle-user fa-8x mb-2" style="position: relative;"></i> --}}
                        {{-- カメラアイコン→押すとファイル選択できる --}}
                        <label for="file-input" style="position: absolute; right: 11.5rem; top:7rem; color: #696969; z-index: 1; background-color: #d3d3d3;  width: 36px; height: 36px; border-radius: 50%; display: inline-block; line-height: 36px; text-align: center; cursor: pointer;">
                            <i class="fa-solid fa-camera-retro fa-xl" ></i>
                        </label>
                        <input type="file" id="file-input" style="display: none;">
                        {{-- <img width="32" height="32" src="https://img.icons8.com/material-two-tone/24/000000/apple-camera.png" alt="apple-camera" > --}}
                    </div>
                </div>

                <div class="modal-body " style="font-family: EB Garamond">
                    <div class="d-flex justify-content-center align-items-center flex-column w-100">
                        {{-- User name --}}
                        <div class="row d-flex align-items-center justify-content-between w-75">
                            <div class="col-4">
                                <label for="username" class="form-label me-3">User Name</label>
                            </div>
                            <div class="d-flex col-8">
                                <input type="text" id="username" name="username" class="form-control input" placeholder="John">
                            </div>
                        </div>
                        <hr class="w-100">
                        <div class="row d-flex align-items-center justify-content-between w-75">
                            {{-- Full name --}}
                            <div class="col-4">
                                <label for="name" class="form-label me-3">Full Name</label>
                            </div>
                            <div class="d-flex col-8">
                                <input type="text" id="name" name="first-name" class="form-control me-2 input" placeholder="John">
                                <input type="text" id="name" name="last-name" class="form-control input" placeholder="Smith">
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
