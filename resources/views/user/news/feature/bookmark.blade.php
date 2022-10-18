@guest
    <p class="bookmark">
        <i class="fa-regular fa-bookmark"
            data-bs-toggle="modal" data-bs-target="#feature" data-newsid="{{ $news->id }}">
        </i>
    </p>
@else
    @if (Auth::user()->hasVerifiedEmail())
        <p class="bookmark">
            <i class="fa-bookmark bookmark-toggle @if($news->isBookmarked()) fa-solid text-success @else fa-regular @endif"
                data-newsid="{{ $news->id }}">
            </i>
        </p>
    @else
        <p class="bookmark">
            <i class="fa-regular fa-bookmark"
                data-bs-toggle="modal" data-bs-target="#verify" data-newsid="{{ $news->id }}">
            </i>
        </p>
    @endif
@endguest