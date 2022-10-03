@if (Auth::check() && $news->isLiked())
    <p class="reaction">
        <span class="upCount">{{ $news->getLike()->count() }}</span>
        <i class="fa-regular fa-thumbs-up up-toggle text-primary" data-newsid="{{ $news->id }}"></i>
    </p>
@elseif (Auth::check() && !Auth::user()->hasVerifiedEmail())
    <p class="me-2">
        <span class="upCount">{{ $news->getLike()->count() }}</span>
        <i class="reaction fa-regular fa-thumbs-up up-toggle"
             data-bs-toggle="modal" data-bs-target="#verify"
            data-newsid="{{ $news->id }}"></i>
    </p>
@else
    <p class="reaction">
        <span class="upCount">{{ $news->getLike()->count() }}</span>
        <i class="fa-regular fa-thumbs-up up-toggle"
            @guest data-bs-toggle="modal" data-bs-target="#feature" @endguest
            data-newsid="{{ $news->id }}"></i>
    </p>
@endif
@if (Auth::check() && $news->isDisliked())
    <p class="reaction">
        <span class="downCount">{{ $news->getDislike()->count() }}</span>
        <i class="fa-regular fa-thumbs-down down-toggle text-primary" data-newsid="{{ $news->id }}"></i>
    </p>
@elseif (Auth::check() && !Auth::user()->email_verified_at)
    <p class="me-2">
        <span class="downCount">{{ $news->getDislike()->count() }}</span>
        <i class="reaction fa-regular fa-thumbs-down down-toggle"
            data-bs-toggle="modal" data-bs-target="#verify"
            data-newsid="{{ $news->id }}"></i>
    </p>
@else
    <p class="reaction">
        <span class="downCount">{{ $news->getDislike()->count() }}</span>
        <i class="fa-regular fa-thumbs-down down-toggle"
            @guest  data-bs-toggle="modal" data-bs-target="#feature" @endguest
            data-newsid="{{ $news->id }}"></i>
    </p>
@endif
@include('user/news/modal/reaction')
@include('user/news/modal/verify')
