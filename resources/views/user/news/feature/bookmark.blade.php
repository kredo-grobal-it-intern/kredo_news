@if (Auth::check() && $news->isBookmarked())
    <p>
        <i class="bookmark fa-solid fa-bookmark bookmark-toggle text-success" data-newsid="{{ $news->id }}"></i>
    </p>
@else
    <p>
        <i class="bookmark fa-regular fa-bookmark bookmark-toggle" @guest data-bs-toggle="modal" data-bs-target="#feature" @endguest data-newsid="{{ $news->id }}"></i>
    </p>
@endif
