
<div class="modal fade" id="eventowner-delete-event{{$event->id}}">
    <div class="modal-dialog">
        <form action="{{ route('events.destroy', $event->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="img-container modal-title w-100">
                        @if (is_null($event->event_image))
                            <img src="{{ asset('images/event-test/noimage.png') }}" alt="no image" class="w-100 rounded" style="object-fit: cover; height: 300px;">
                        @else
                            <img src="{{ $event->event_image }}" alt="{{ $event->event_name }}" class="w-100 rounded" style="object-fit: cover; height: 300px;">
                        @endif
                    </div>
                </div>
                <div class="modal-body" style="font-family: EB Garamond">
                    <p class="h5 text-center">Are you sure you want to delete <b>{{ $event->event_name }}</b>?</p>
                    <p class="text-center">All you selected files will be deleted and you won't be able to see all data.
                        <br>This action cannot be undone.
                    </p>
                    <div class="w-75 mb-3 mx-auto">
                        <label for="password"><b>Password</b></label>
                        <div class="input-group">
                            <input type="password" id="password{{$event->id}}" name="password" class="form-control" required>
                            <div class="input-group-text">
                                <i class="fa-solid fa-eye-slash toggle-password" onclick="togglePasswordVisibility({{$event->id}})" style="cursor: pointer;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center border-0">
                    <button type="button" class="btn btn-outline-red me-5 p-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-red p-2">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- モーダルの場合の切り替え --}}
<script>
    function togglePasswordVisibility(eventId) {
        const passwordInput = document.getElementById('password' + eventId);
        const toggleIcon = passwordInput.nextElementSibling.querySelector('.toggle-password');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
        }
    }
</script>

{{-- 通常の切り替え --}}
{{-- <script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.querySelector('.toggle-password');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
        }
    }
</script> --}}