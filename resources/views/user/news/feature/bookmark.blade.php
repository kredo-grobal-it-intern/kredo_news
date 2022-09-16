@if (Auth::check() && $news->isBookmarked())
    <p class="col offset-1 fs-2"><i class="fa-solid fa-bookmark bookmark-toggle text-success"
            data-newsid="{{ $news->id }}"></i></p>
@else
    <p class="col offset-1 fs-2"><i class="fa-regular fa-bookmark bookmark-toggle" data-newsid="{{ $news->id }}"></i>
    </p>
@endif
