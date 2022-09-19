<div class="col-lg-3 col-md-6 mb-4">
    <div class="card">
        @if($reaction->image)
        <img src="{{asset('images/countries/' . $reaction->image)}}" alt="" class="card-img-top news-img">
        @else
        <img src="{{asset('images/country.jpg')}}" alt="{{ $reaction->country->name }}" class="card-img-top news-img">
        @endif
        <div class="card-body">
            <p class="fw-bold h2">{{$reaction->title}}</p>
            <p class="mb-0">{{$reaction->description}}</p>
            <small class="text-muted">{{$reaction->author}}</small>
        </div>
        <div class="row align-items-center">
            <p class="col offset-1 fs-5">{{$reaction->good->count()}} <i class="fa-regular fa-thumbs-up"></i></p>
            <p class="col fs-5">{{$reaction->bad->count()}} <i class="fa-regular fa-thumbs-down"></i></p>
            <p class="col fs-5">{{$reaction->comments->count()}} <i class="fa-regular fa-comment-dots"></i></p>
            @if ($reaction->isBookmarked())
            <p class="col offset-1 fs-2"><i class="fa-solid fa-bookmark bookmark-toggle text-success"
                    data-newsid="{{ $reaction->id }}"></i></p>
            @else
                <p class="col offset-1 fs-2"><i class="fa-regular fa-bookmark bookmark-toggle" data-newsid="{{ $reaction->id }}"></i>
                </p>
            @endif        
        </div>
        <div class="card-footer bg-white border-top-0">
            <div class="row">
                <div class="col-4" style="font-size:12px;"><i class="fa-regular fa-clock"></i> {{ date('n/j(D)', strtotime($reaction->published_at)) }}</div>
                <div class="col-4 px-1"><span class="badge bg-opacity-50 w-100" style="background-color: #052962;">{{ $reaction->country->name }}</span></div>
                <div class="col-4 px-1"><span class="badge bg-opacity-50 w-100" style="background-color: #052962;">{{ $reaction->category->name }}</span></div>
            </div>
        </div>
    </div>
</div>