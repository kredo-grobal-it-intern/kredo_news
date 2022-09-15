<div class="row mt-5">
    <div class="col-md-4">
        @if ($user->avatar)
        <img src="{{asset('/storage/avatars/'.$user->avatar)}}" alt="" class="rounded-circle nav-avatar ps-3" style="width:40%; height:130px">
        @else
        <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
        @endif
    </div>
    <div class="col-8">
        <div class="row my-3">
            <h2 class="fw-bold">Username</h2>
            @if (Auth::user()->id === $user->id)
                <a href="{{route('user.profile.edit')}}" class="text-decoration-none text-secondary">Edit Profile</a>
            @endif
        </div>
            <div class="row fw-bold">
                <div class="col">68 Comments</div>
                <div class="col">100 Follower</div>
                <div class="col">50 Follow</div>
            </div>
            <div class="row my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia qui corporis dolorum, rerum debitis tempora? Modi consequuntur non magni aliquid.
            </div>
            <a href="{{ route('user.profile.show.likes', $user->id) }}" class="btn btn-secondary me-3">News Liked by Username</a>
            <a href="{{ route('user.profile.show.bookmarks', $user->id) }}" class="btn btn-secondary">Bookmarks</a>
    </div>
</div>
