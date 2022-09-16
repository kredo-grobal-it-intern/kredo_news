<div class="modal fade" id="follower">
    <div class="modal-dialog modal-dialog-scrollable modal-sm h-50" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="modalTitleId">Followers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach ($user->followers as $follower)
                    <div class="row align-items-center mb-3">
                        <div class="col-8">
                            <a href="{{ route('user.profile.show', $follower->userFollower->id) }}" class="text-decoration-none d-flex align-items-center" >
                                @if ($follower->userFollower->avatar)
                                <img src="{{asset('/storage/avatars/'. $follower->userFollower->avatar)}}" alt="{{ $follower->userFollower->username }}" class="rounded-circle me-2" style="width:32px; height:32px; object-fit: cover; ">
                                @else
                                <i class="fa-solid fa-circle-user text-secondary me-2" style="font-size: 32px"></i>
                                @endif
                                <span class="fs-6 fw-normal text-dark">{{ $follower->userFollower->username }}</span>
                            </a>

                        </div>
                        <div class="col-4">
                            <form action="{{ route('user.destroy.follower', $follower->follower_id) }}" method="post">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-white btn-sm btn-border-2 border-secondary fw-bold">Remove</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>