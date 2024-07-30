@vite(['resources/js/delete_modal.js'])

<div class="modal fade" id="user-profile-delete">
    <div class="modal-dialog">
        <form action="{{ route('users.delete') }}" method="post">
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
                    <div class="d-flex justify-content-center">
                    @if (Auth::user()->avatar)
                        <img src="{{ Auth::user()->avatar }}" alt="" class="rounded-circle avatar-lg">
                    @else
                        <span class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-circle-user fa-8x"></i>
                        </span>
                    @endif

                    </div>
                        <p class="h3 mt-2">{{ $user->username }}</p>

                    {{-- パスワード入力欄 --}}
                    <div class="text-start">
                        <label for="form-label" class="form-label"><b>Password</b></label>
                        <div class="input-group mb-3 position-relative">
                            <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control" placeholder="Password">
                            <div class="input-group-text d-flex justify-content-center align-items-center mb-0" style="width: 40px; height: 38px;">
                                <i class="fa-solid fa-eye-slash toggle-password" onclick="togglePasswordVisibility()" style="cursor: pointer; "></i>
                            </div>
                            {{-- <div class="d-flex h-100 end-0 p-2 position-absolute justify-content-center align-items-center" >
                                <i class="fa-solid fa-eye-slash"></i>
                            </div> --}}
                        </div>
                        @error('password')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
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

