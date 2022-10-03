<div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4">
    <div class="card">
        @if($news->image)
            <a href="{{ route('news.show', $news->id) }}"><img src="{{asset('images/countries/' . $news->image)}}" alt="" class="card-img-top news-list-img"></a>
        @else
            <a href="{{ route('news.show', $news->id) }}"><img src="{{asset('images/country.jpg')}}" alt="{{ $news->country->name }}" class="card-img-top news-list-img"></a>
        @endif
        <div class="card-body">
            <p class="fw-bold news-list-title"><a href="{{ route('news.show', $news->id) }}">{{$news->title}}</a></p>
            <p class="mb-0 news-list-description">{{$news->description}}</p>
            <small class="text-muted news-list-author">{{$news->author}}</small>
            <div class="d-flex mt-1 justify-content-end status">
                @include('user.news.feature.reaction')
                @include('user.news.feature.comment')
                @include('user.news.feature.bookmark')
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    <span class="news-list-clock"><i class="fa-regular fa-clock"></i> {{ date('n/j(D)', strtotime($news->published_at)) }}</span>
                </div>
                <div>
                    <span class="badge bg-opacity-50 news-list-badge">{{ $news->country->name }}</span>
                    <span class="badge bg-opacity-50 news-list-badge">{{ $news->category->name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>