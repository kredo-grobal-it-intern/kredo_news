@if ($user->id !== Auth::user()->id)
    @if (Auth::check() && $user->isFollowed())
            <button class="col-2 btn btn-outline-danger w-25 follow-toggle"  data-userid="{{ $user->id }}">Unfollow</button>
        @else
            <button class="col-2 btn btn-outline-primary w-25 follow-toggle" data-userid="{{ $user->id }}">Follow</button>
    @endif
@endif
