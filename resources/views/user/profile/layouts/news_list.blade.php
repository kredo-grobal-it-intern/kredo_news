<div class="col-lg-3 col-md-6 mb-4">
    <div class="card">
        @if($news->image)
        <img src="{{asset('images/countries/' . $news->image)}}" alt="" class="card-img-top news-img">
        @else
        <img src="{{asset('images/country.jpg')}}" alt="{{ $news->country->name }}" class="card-img-top news-img">
        @endif
        <div class="card-body">
            <p class="fw-bold h2">{{$news->title}}</p>
            <p class="mb-0">{{$news->description}}</p>
            <small class="text-muted">{{$news->author}}</small>
        </div>
        <div class="row align-items-center">
            <p class="col offset-1 fs-5">{{$news->getLike()->count()}} <i class="fa-regular fa-thumbs-up"></i></p>
            <p class="col fs-5">{{$news->getDislike()->count()}} <i class="fa-regular fa-thumbs-down"></i></p>
            <p class="col fs-5">{{$news->comments->count()}} <i class="fa-regular fa-comment-dots"></i></p>
            @if ($news->isBookmarked())
            <p class="col offset-1 fs-2"><i class="fa-solid fa-bookmark bookmark-toggle text-success"
                    data-newsid="{{ $news->id }}"></i></p>
            @else
                <p class="col offset-1 fs-2"><i class="fa-regular fa-bookmark bookmark-toggle" data-newsid="{{ $news->id }}"></i>
                </p>
            @endif
        </div>
        <div class="card-footer bg-white border-top-0">
            <div class="row">
                <div class="col-4" style="font-size:12px;"><i class="fa-regular fa-clock"></i> {{ date('n/j(D)', strtotime($news->published_at)) }}</div>
                <div class="col-4 px-1"><span class="badge bg-opacity-50 w-100" style="background-color: #052962;">{{ $news->country->name }}</span></div>
                <div class="col-4 px-1"><span class="badge bg-opacity-50 w-100" style="background-color: #052962;">{{ $news->category->name }}</span></div>
            </div>
        </div>
    </div>
</div>