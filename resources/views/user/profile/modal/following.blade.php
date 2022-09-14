<div class="modal fade" id="following">
    <div class="modal-dialog modal-dialog-scrollable modal-sm h-50" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title w-100" id="modalTitleId">Followings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @foreach ($user->followings as $following)
                    <div class="row align-items-center mb-3">
                        <div class="col-8">
                            <a href="{{ route('user.profile.show', $following->userFollowing->id) }}" class="text-decoration-none d-flex align-items-center" >
                                @if ($following->userFollowing->avatar)
                                <img src="{{asset('/storage/avatars/'. $following->userFollowing->avatar)}}" alt="{{ $following->userFollowing->username }}" class="rounded-circle me-2" style="width:32px; height:32px; object-fit: cover; ">
                                @else
                                <i class="fa-solid fa-circle-user text-secondary me-2" style="font-size: 32px"></i>
                                @endif
                                <span class="fs-6 fw-normal text-dark">{{ $following->userFollowing->username }}</span>
                            </a>

                        </div>
                        <div class="col-4">
                            <button class="btn btn-white btn-sm btn-border-2 border-secondary fw-bold">Remove</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>