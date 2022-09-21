<li class="row comment-list-item pt-4 pb-3">
    <div class="col-1">
        @if ($comment->user->avatar)
            <a href="{{ route('user.profile.show.likes', $comment->user->id) }}" class="text-decoration-none text-muted"><img src="{{ asset('images/avatars/' . $comment->user->avatar) }}" alt="User Avatar" class="avatar"></a>
        @else
            <a href="{{ route('user.profile.show.likes', $comment->user->id) }}" class="text-decoration-none text-muted"><i class="fa-solid fa-circle-user fa-2x profile-icon"></i></a>
        @endif
    </div>
    <div class="col-11">
        <!-- Comment header -->
        <div class="profile">
            <div class="d-flex justify-content-between">
                <h6 class="fw-bold"><a href="{{ route('user.profile.show.likes', $comment->user->id) }}" class="username text-dark">{{ $comment->user->username }}</a></h6>
                <div class="reaction-area text-end">
                    @auth
                        @if ($comment->user_id === Auth::user()->id)
                            <form action="{{ route('user.comment.destroy', $comment->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="comment-delete text-danger border-0 bg-transparent">Delete</button>
                            </form>
                        @endif
                    @endauth
                    <a href="" class="me-2 text-decoration-none text-dark">1000 <i class="fa-regular fa-thumbs-up"></i></a>
                    <a href="" class="me-2 text-decoration-none text-dark">200 <i class="fa-regular fa-thumbs-down"></i></a>
                </div>
            </div>
            <small class="text-muted">Soccer player / Musician / Science</small>
        </div>
        <!-- Comment body -->
        <div class="comment-content mt-3">
            <p>{{ $comment->body }}</p>
        </div>
    </div>
</li>
