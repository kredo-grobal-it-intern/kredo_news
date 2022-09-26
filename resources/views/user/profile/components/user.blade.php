<div class="row mt-3 mt-lg-5 align-items-center mx-auto profile">
    <div class="col-lg-4 profile-avatar">
        @if ($user->avatar)
            <img src="{{asset('/images/avatars/'.$user->avatar)}}" alt="Image" class="profile-avatar-icon rounded-circle d-block mx-auto">
        @else
            <i class="profile-avatar-none fa-solid fa-circle-user text-secondary d-block text-center"></i>
        @endif
    </div>
    <div class="col-12 col-lg-8">
        <div class="profile-heading mb-2">
            @if ($user->avatar)
                <img src="{{asset('/images/avatars/'.$user->avatar)}}" alt="Image" class="profile-heading-icon rounded-circle me-2">
            @else
                <i class="profile-heading-none fa-solid fa-circle-user text-secondary me-2"></i>
            @endif
            <h2 class="fw-bold mb-0">{{ $user->username }}</h2>
        </div>
        <div class="profile-action mb-2">
            @if (Auth::user()->id === $user->id)
                <a href="{{route('user.profile.edit')}}" class="text-decoration-none text-secondary">Edit Profile</a>
            @else
                @include('user.news.feature.follow')
            @endif
        </div>
        <div class="row">
            <div class="col-12 col-sm-4">
                <button type="button" class="btn border-0 fs-5 m-0 p-0" data-bs-toggle="modal" data-bs-target="#comment">
                    <span class="fw-bold fs-4">{{ $user->comments->count() }}</span> Comments
                </button>
                @include('user.profile.modal.comments')
            </div>
            <div class="col-12 col-sm-4">
                <button type="button" class="btn border-0 fs-5 m-0 p-0" data-bs-toggle="modal" data-bs-target="#follower">
                    <span class="fw-bold fs-4">{{ $user->followers->count() }}</span> Followers
                </button>
                @include('user.profile.modal.follower')
            </div>
            <div class="col-12 col-sm-4">
                <button type="button" class="btn border-0 fs-5 m-0 p-0" data-bs-toggle="modal" data-bs-target="#following">
                    <span class="fw-bold fs-4">{{ $user->followings->count() }}</span> Followings
                </button>
                @include('user.profile.modal.following')
            </div>
        </div>
        <p class="my-3">{{ $user->description }}</p>
        <div class="profile-btn">
            <a href="{{ route('user.profile.show.likes', $user->id) }}" class="profile-btn-like btn btn-sm me-3">Likes</a>
            <a href="{{ route('user.profile.show.bookmarks', $user->id) }}" class="profile-btn-bookmark btn btn-sm">Bookmarks</a>
        </div>
    </div>
</div>

