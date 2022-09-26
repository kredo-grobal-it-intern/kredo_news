<button class="btn btn-outline-danger btn-sm {{ $user->isFollowed() ? '' : 'd-none' }}" id="unfollow"  data-userid="{{ $user->id }}">Unfollow</button>
<button class="btn btn-outline-primary btn-sm {{ $user->isFollowed() ? 'd-none' : '' }}" id="follow" data-userid="{{ $user->id }}">Follow</button>
