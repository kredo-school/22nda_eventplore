
<div class="modal fade" id="user-delete-reservation">
    <div class="modal-dialog">
        <form action="#" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header border-0">
                    <div class="img-container modal-title w-100">
                        <img src="{{ asset('images/fireworks.jpg') }}" alt="fireworks" class="w-100 rounded" style="object-fit: cover; height: 300px;">
                    </div>
                </div>
                <div class="modal-body " style="font-family: EB Garamond">
                    <p class="h5 text-center">Are you sure you want to cancel reservation of <b>EventName</b>?</p>
                    <p class="text-center">All you selected  reservation will be deleted and you won't be able to see it.
                        <br>This action cannot be undone.
                    </p>
                    <label for="form-label"><b>Password</b></label>
                    <div class="input-group mb-3 position-relative">
                        <input type="text" class="form-control rounded">
                        <div class="d-flex h-100 end-0 p-2 position-absolute justify-content-center align-items-center">
                            <i class="fa-solid fa-eye-slash"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center border-0">
                    <button type="button" class="btn-outline-red rounded me-5 p-2" data-bs-dismiss="modal">Back</button>
                    <button type="submit" class="btn-red rounded border-0 p-2">Cancel Reservation</button>
                </div>
            </div>
        </form>
    </div>
</div>
