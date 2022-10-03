<button class="btn btn-outline-danger btn-sm unfollow {{ $user->isFollowed() ? '' : 'd-none' }}" data-userid="{{ $user->id }}">Unfollow</button>
<button class="btn btn-outline-primary btn-sm follow {{ $user->isFollowed() ? 'd-none' : '' }}" data-userid="{{ $user->id }}">Follow</button>
