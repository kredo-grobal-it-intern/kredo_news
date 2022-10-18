<div class="col-md-7 order-md-2 col-12">
    <!-- news image -->
    <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}" alt="{{ $news->image }}" class="w-100 top-news-image"></a>
</div>
<!-- top news -->
<div class="col-md-5 order-md-1 col-12">
    <!-- heading & description & reaction -->
    <div class="top-news-content">
        <h3 class="fw-bold mt-3 mt-md-0 top-news-heading"><a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a></h3>
        <p class="top-news-description">{{ $news->description }}</p>
    </div>
    <div class="d-flex mt-1 mt-md-3 justify-content-end status">
        @include('user.news.feature.reaction')
        @include('user.news.feature.comment')
        @include('user.news.feature.bookmark')
    </div>
</div>
