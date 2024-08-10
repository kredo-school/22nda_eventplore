
<div class="modal fade" id="user-delete-comment{{ $review->id }}" tabindex="-1" aria-labelledby="deleteCommentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('comments.destroy', $review->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center align-items-center mt-3">
                    <div class="modal-title h2" style="color: #F7142B;">
                        <i class="fa-solid fa-trash-can fa-xl"></i> Delete Comment
                    </div>
                </div>
                <div class="modal-body" style="font-family: EB Garamond">
                    <p class="text-center">
                        Are you sure you want to delete this comment?<br>
                        This action cannot be undone.
                    </p>
                    <p class="h5">{{ $review->comment }}</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-outline-red me-5 px-5 py-2" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-red px-5 py-2">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div>
