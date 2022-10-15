<!-- Like button -->
@guest
    <p class="reaction">
        <span class="upCount">{{ number_format($news->getLike()->count()) }}</span>
        <i class="fa-regular fa-thumbs-up"
            data-bs-toggle="modal" data-bs-target="#feature"
            data-newsid="{{ $news->id }}"></i>
    </p>
@else
    @if (Auth::user()->hasVerifiedEmail())
        <p class="reaction">
            <span class="upCount">{{ number_format($news->getLike()->count()) }}</span>
            <i class="fa-regular fa-thumbs-up up-toggle @if($news->isLiked()) text-primary @endif"
                data-newsid="{{ $news->id }}"></i>
        </p>
    @else
        <p class="reaction">
            <span class="upCount">{{ number_format($news->getLike()->count()) }}</span>
            <i class="fa-regular fa-thumbs-up"
                data-bs-toggle="modal" data-bs-target="#verify"
                data-newsid="{{ $news->id }}"></i>
        </p>
    @endif
@endguest

<!-- Dislike button -->
@guest
    <p class="reaction">
        <span class="downCount">{{ number_format($news->getDislike()->count()) }}</span>
        <i class="fa-regular fa-thumbs-down"
            data-bs-toggle="modal" data-bs-target="#feature"
            data-newsid="{{ $news->id }}"></i>
    </p>
@else
    @if (Auth::user()->hasVerifiedEmail())
        <p class="reaction">
            <span class="downCount">{{ number_format($news->getDislike()->count()) }}</span>
            <i class="fa-regular fa-thumbs-down down-toggle @if($news->isDisliked()) text-danger @endif"
                data-newsid="{{ $news->id }}"></i>
        </p>
    @else
        <p class="reaction">
            <span class="downCount">{{ number_format($news->getDislike()->count()) }}</span>
            <i class="fa-regular fa-thumbs-down"
                data-bs-toggle="modal" data-bs-target="#verify"
                data-newsid="{{ $news->id }}"></i>
        </p>
    @endif
@endguest
@include('user.news.modal.reaction')
@include('user.news.modal.verify')
