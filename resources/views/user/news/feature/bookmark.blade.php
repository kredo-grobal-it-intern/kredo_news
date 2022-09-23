@if (Auth::check() && $news->isBookmarked())
    <p>
        <i class="bookmark fa-solid fa-bookmark bookmark-toggle text-success" data-newsid="{{ $news->id }}"></i>
    </p>
@else
    <p>
        <i class="bookmark fa-regular fa-bookmark" @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#feature" @else class="bookmark-toggle" @endif data-newsid="{{ $news->id }}"></i>
    </p>
@endif
