<button class="btn btn-outline-danger w-25 {{ $user->isFollowed() ? '' : 'd-none' }}" id="unfollow"  data-userid="{{ $user->id }}">Unfollow</button>
<button class="btn btn-outline-primary w-25 {{ $user->isFollowed() ? 'd-none' : '' }}" id="follow" data-userid="{{ $user->id }}">Follow</button>
