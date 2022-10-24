<div class="modal fade" id="comment">
    <div class="modal-dialog modal-dialog-scrollable modal-md h-50" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="modalTitleId">Comments</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    @foreach ($user->comments as $comment)
                        <li class="row align-items-start mb-2">
                            <div class="col-10">
                                <a href="{{ route('news.show', $comment->news->id) }}"
                                    class="text-decoration-none fs-5 text-black">{{ $comment->news->title }}</a>
                                <blockquote class="ms-3 pe-3" style="border-left: solid 3px gray;">
                                    <p class="ms-2 text-muted fst-italic small">{{ $comment->body }}</p>
                                </blockquote>
                            </div>
                            <div class="col-2 ps-0 pe-3">
                                @if (Auth::user()->id === $user->id)
                                    <button type="button"
                                        class="btn btn-outline-danger btn-sm btn-border-2 fw-bold comment-delete"
                                        data-commentid="{{ $comment->id }}">Delete</button>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
