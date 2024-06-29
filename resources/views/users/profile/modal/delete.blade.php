
<div class="modal fade" id="user-profile-delete">
    <div class="modal-dialog">
        <form action="#" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header border-0 d-flex justify-content-center align-items-center mt-3">
                   <div class="modal-title h2" style="color: #F7142B;">
                    {{-- タイトル --}}
                        <i class="fa-solid fa-trash-can fa-xl"></i> Delete Your Account
                   </div>
                </div>
                <div class="modal-body" style="font-family: EB Garamond">
                    <p class="text-center">
                        Are you sure you want to delete your account?<br>
                        All associated data will be permanently removed.<br>
                        This action cannot be undone.
                    </p>
                    {{-- ユーザーのアイコン --}}
                    <img src="{{ asset('images/Jackie.jpeg') }}" alt="Jackie" class="rounded-circle" style="width: 128px; height: 128px;">
                    <p class="h3 mt-2">User Name</p>

                    {{-- パスワード入力欄 --}}
                    <div class="text-start">
                        <label for="form-label" class="form-label"><b>Password</b></label>
                        <div class="input-group mb-3 position-relative">
                            <input type="text" class="form-control rounded input">
                            <div class="d-flex h-100 end-0 p-2 position-absolute justify-content-center align-items-center" >
                                <i class="fa-solid fa-eye-slash"></i>
                            </div>
                        </div>
                    </div>

                </div>
                {{-- 確認ボタン --}}
                <div class="modal-footer justify-content-center border-0 mb-3">
                    <button type="button" class="btn btn-outline-red me-5 px-5 py-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-red px-5 py-2">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
