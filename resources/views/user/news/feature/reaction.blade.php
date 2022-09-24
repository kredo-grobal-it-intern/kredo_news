@if (Auth::check() && $news->isUp())
    <p class="me-2">
        <span class="upCount">{{ $news->getLike()->count() }}</span>
        <i class="reaction fa-regular fa-thumbs-up up-toggle text-primary" data-newsid="{{ $news->id }}"></i>
    </p>
@else
    <p class="me-2">
        <span class="upCount">{{ $news->getLike()->count() }}</span>
        <i class="reaction fa-regular fa-thumbs-up up-toggle"
            @guest data-bs-toggle="modal" data-bs-target="#feature" @endguest
            data-newsid="{{ $news->id }}"></i>
    </p>
@endif
@if (Auth::check() && $news->isDown())
    <p class="me-2">
        <span class="downCount">{{ $news->getDislike()->count() }}</span>
        <i class="reaction fa-regular fa-thumbs-down down-toggle text-primary" data-newsid="{{ $news->id }}"></i>
    </p>
@else
    <p class="me-2">
        <span class="downCount">{{ $news->getDislike()->count() }}</span>
        <i class="reaction fa-regular fa-thumbs-down down-toggle"
            @guest  data-bs-toggle="modal" data-bs-target="#feature" @endguest
            data-newsid="{{ $news->id }}"></i>
    </p>
@endif
@include('user/news/modal/reaction')
