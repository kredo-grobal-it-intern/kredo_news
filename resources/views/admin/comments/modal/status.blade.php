<div class="modal fade" id="hide-comment-{{ $comment->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-dange">
        <div class="modal-header border-danger">
            <h5 class="modal-title text-danger">Deactivate user</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-danger">
            <p class="fs-5">Are you sure to hide this comment?</p>
            <div>
            <p class="text-wrap">"{{ $comment->body }}"</p>
            </div>
        </div>
        <div class="modal-footer border-0">
            <form action="{{ route('admin.comments.destroy' , $comment->id) }}" method="post">
            @csrf
            @method('DELETE')
            
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger deactivate">Hide</button>
            </form>
        </div>
        </div>
    </div>
</div>