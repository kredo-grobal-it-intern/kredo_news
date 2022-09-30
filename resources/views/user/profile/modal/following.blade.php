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
                            <a href="{{ route('user.profile.show', $following->id) }}" class="text-decoration-none d-flex align-items-center" >
                                @if ($following->avatar)
                                    <img src="{{asset('/images/avatars/'. $following->avatar)}}" alt="{{ $following->username }}" class="user-avatar-icon rounded-circle me-2">
                                @else
                                    <i class="user-avatar-none fa-solid fa-circle-user text-secondary me-2"></i>
                                @endif
                                <span class="fs-6 fw-normal text-dark">{{ $following->username }}</span>
                            </a>
                        </div>
                        @if (Auth::user()->id !== $following->id)
                            <div class="col-4">
                                @include('user.news.feature.follow', ['user' => $following])
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>