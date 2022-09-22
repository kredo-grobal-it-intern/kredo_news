<div class="row mt-5 align-items-center ">
    <div class="col-4">
        @if ($user->avatar)
            <img src="{{asset('/images/avatars/'.$user->avatar)}}" alt="Image" class="rounded-circle d-block mx-auto" style="width:180px; height:180px; object-fit:cover;" >
        @else
        <i class="fa-solid fa-circle-user text-secondary d-block text-center" style="font-size:180px;"></i>
        @endif
    </div>
    <div class="col-8">
        <div class="row">
            <h2 class="fw-bold">{{ $user->username }}</h2>
            @if (Auth::user()->id === $user->id)
                <a href="{{route('user.profile.edit')}}" class="text-decoration-none text-secondary">Edit Profile</a>
            @endif
            @include('user.news.feature.follow')
        </div>
        <div class="row">
            <div class="col-3">
                <button type="button" class="btn border-0 fs-5 m-0 p-0" data-bs-toggle="modal" data-bs-target="#comment">
                    <span class="fw-bold fs-4">{{ $user->comments->count() }}</span> Comments
                </button>
            @include('user.profile.modal.comments')
            </div>
            <div class="col-3">
                <button type="button" class="btn border-0 fs-5 m-0 p-0" data-bs-toggle="modal" data-bs-target="#follower">
                    <span class="fw-bold fs-4">{{ $user->followers->count() }}</span> Followers
                </button>
            @include('user.profile.modal.follower')
            </div>
            <div class="col-3">
                <button type="button" class="btn border-0 fs-5 m-0 p-0" data-bs-toggle="modal" data-bs-target="#following">
                    <span class="fw-bold fs-4">{{ $user->followings->count() }}</span> Followings
                </button>
                @include('user.profile.modal.following')
            </div>
        </div>
        <p class="my-3 w-75">{{ $user->description }}</p>
        <div class="row">
            <div class="col-2">
                <a href="{{ route('user.profile.show.likes', $user->id) }}" class="btn btn-sm text-white me-3 w-100" style="background-color: #052962;">Likes</a>
            </div>
            <div class="col-2">
                <a href="{{ route('user.profile.show.bookmarks', $user->id) }}" class="btn btn-sm text-white w-100" style="background-color: #052962;">Bookmarks</a>
            </div>
        </div>
    </div>
</div>

