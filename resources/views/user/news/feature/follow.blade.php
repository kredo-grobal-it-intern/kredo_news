@if ($user->id !== Auth::user()->id)
    <button class="col-2 btn btn-outline-danger w-25 @if (!App\Models\Follow::isFollowed($user->id)) hide @endif" id="unfollow"  data-userid="{{ $user->id }}">Unfollow</button>
    <button class="col-2 btn btn-outline-primary w-25 @if (App\Models\Follow::isFollowed($user->id)) hide @endif" id="follow" data-userid="{{ $user->id }}">Follow</button>
@endif
