@if (Auth::check() && $news->isBookmarked())
    <p class="bookmark">
        <i class="fa-solid fa-bookmark bookmark-toggle text-success" data-newsid="{{ $news->id }}"></i>
    </p>
@else
    <p class="bookmark">
        <i class="fa-regular fa-bookmark bookmark-toggle" @guest data-bs-toggle="modal" data-bs-target="#feature" @endguest data-newsid="{{ $news->id }}"></i>
    </p>
@endif
