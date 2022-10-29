<div class="row mt-3 mt-lg-5 align-items-center mx-auto profile">
    <div class="col-12 col-lg-4 profile-avatar">
        @if ($user->avatar)
            <img src="{{asset('storage/images/avatars/'.$user->avatar)}}" alt="Image" class="profile-avatar-icon rounded-circle d-block mx-auto">
        @else
            <i class="profile-avatar-none fa-solid fa-circle-user text-secondary d-block text-center"></i>
        @endif
    </div>
    <div class="col-12 col-lg-8">
        <div class="d-flex d-sm-block justify-content-between align-items-center">
            <div class="">
                <div class="profile-heading align-items-center mb-3">
                    <!-- For responsive -->
                    @if ($user->avatar)
                        <img src="{{asset('storage/images/avatars/'.$user->avatar)}}" alt="Image" class="profile-heading-icon rounded-circle me-2">
                    @else
                        <i class="profile-heading-none fa-solid fa-circle-user text-secondary me-2"></i>
                    @endif
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="fw-bold mb-0">{{ $user->username }}</h2>
                        @if (Auth::id() === $user->id)
                        <div class="dropdown">
                            <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <span class="profile-heading-dropdown"><i class="fa-solid fa-ellipsis"></i></span>
                            </button>
                            <div class="dropdown-menu">
                                <a href="{{route('user.profile.edit')}}" class="dropdown-item text-decoration-none text-secondary"><i class="fa-solid fa-pen-to-square me-1"></i>Edit Profile</a>
                                <button class="btn dropdown-item shadow-none text-primary" data-bs-toggle="modal" data-bs-target="#update-password"><span class="me-1"><i class="fa-solid fa-key"></i></span>Change Password</button>
                                <button class="btn dropdown-item shadow-none text-danger" data-bs-toggle="modal" data-bs-target="#delete-account"><span class="me-1"><i class="fa-solid fa-user-xmark"></i> Delete Account</span></button>
                            </div>
                            @include('user.profile.modal.update_password')
                            @include('user.profile.modal.delete_account')
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="">
                <div class="profile-action mb-3">
                    @if (Auth::id() !== $user->id)
                        @include('user.news.feature.follow')
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4 col-12">
                <button type="button" class="btn profile-btn-to-modal" data-bs-toggle="modal" data-bs-target="#comment">
                    <span class="fw-bold">{{ $user->comments_count }}</span> Comments
                </button>
                @include('user.profile.modal.comments')
            </div>
            <div class="col-sm-4 col-12">
                <button type="button" class="btn profile-btn-to-modal" data-bs-toggle="modal" data-bs-target="#follower">
                    <span class="fw-bold @if(Auth::user()->id === $user->id) auth-follower-count @else user-follower-count @endif">{{ $user->followers_count }}</span> Followers
                </button>
                @include('user.profile.modal.follower')
            </div>
            <div class="col-sm-4 col-12">
                <button type="button" class="btn profile-btn-to-modal" data-bs-toggle="modal" data-bs-target="#following">
                    <span class="fw-bold @if(Auth::user()->id === $user->id) auth-following-count @else user-following-count @endif">{{ $user->followings_count }}</span> Followings
                </button>
                @include('user.profile.modal.following')
            </div>
        </div>
        <p class="mt-3">{{ $user->description }}</p>
        @if (Auth::user()->id === $user->id)
            <div class="profile-btn mb-3">
                <span class="profile-btn-tab me-3 is-active">Likes</span>
                <span class="profile-btn-tab">Bookmarks</span>
            </div>
        @endif
    </div>
</div>
