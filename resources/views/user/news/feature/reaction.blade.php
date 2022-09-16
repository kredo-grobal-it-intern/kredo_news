@if ($news->isUp())
    <p class="col offset-1 fs-5">
        <span class="upCount">{{ $news->like_reactions()->count() > 0 ?? '' }}</span>
        <i class="fa-regular fa-thumbs-up up-toggle text-primary" data-newsid="{{ $news->id }}"></i>
    </p>
@else
    <p class="col offset-1 fs-5">
        <span class="upCount">{{ $news->like_reactions()->count() > 0 ?? '' }}</span>
        <i class="fa-regular fa-thumbs-up up-toggle" data-newsid="{{ $news->id }}"></i>
    </p>
@endif
@if ($news->isDown())
    <p class="col  fs-5">
        <span class="downCount">{{ $news->dislike_reactions()->count() > 0 ?? '' }}</span>
        <i class="fa-regular fa-thumbs-down down-toggle text-primary" data-newsid="{{ $news->id }}"></i>
    </p>
@else
    <p class="col  fs-5">
        <span class="downCount">{{ $news->dislike_reactions()->count() > 0 ?? '' }}</span>
        <i class="fa-regular fa-thumbs-down down-toggle" data-newsid="{{ $news->id }}"></i>
    </p>
@endif
<p class="col fs-5">100 <i class="fa-regular fa-comment-dots"></i></p>
