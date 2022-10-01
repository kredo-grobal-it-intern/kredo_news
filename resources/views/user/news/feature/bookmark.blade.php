@if (Auth::check() && $news->isBookmarked())
    <p class="bookmark">
        <i class="fa-solid fa-bookmark bookmark-toggle text-success" data-newsid="{{ $news->id }}"></i>
    </p>
@elseif (Auth::check() && !Auth::user()->email_verified_at)
    <p>
        <i class="bookmark fa-regular fa-bookmark bookmark-toggle" data-bs-toggle="modal" data-bs-target="#verify"  data-newsid="{{ $news->id }}"></i>
    </p>
@else
    <p class="bookmark">
        <i class="fa-regular fa-bookmark bookmark-toggle" @guest data-bs-toggle="modal" data-bs-target="#feature" @endguest data-newsid="{{ $news->id }}"></i>
    </p>
@endif
