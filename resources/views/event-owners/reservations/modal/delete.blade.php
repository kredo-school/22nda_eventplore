
<div class="modal fade" id="eventowner-delete-reservation">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-0">
                <div class="img-container modal-title w-100">
                    <img src="{{ asset('images/fireworks.jpg') }}" alt="fireworks" class="w-100" style="object-fit: cover; height: 300px;">
                </div>
            </div>
            <div class="modal-body" style="font-family: EB Garamond">
                <p class="text-center">Are you sure you want to cancel reservation of  UserName?  </p>
                <div class="mt-3">
                    <p class="mt-1">All you selected  reservation will be deleted and you won't be able to see it.
                        This action cannot be undone.</p>
                        <label for="password" class="form-label" >Password</label>
                            <input type="password" name="" id="password" required="" />
                            <span class="password-toggle-icon"><i class="fas fa-eye"></i></span>
                        </div>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn-outline-red rounded me-5" data-bs-dismiss="modal">Back</button>
                <button type="submit" class="btn-red rounded border-0">Cancel Reservation</button>
            </div>
        </div>
    </div>
</div>
