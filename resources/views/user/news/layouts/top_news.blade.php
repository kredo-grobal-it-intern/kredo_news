<div class="col-md-7 order-md-2 col-12">
    <!-- news image -->
    <a href="{{ route('news.show', $country_news['latest']->id) }}"><img src="{{ asset('images/news/' . $country_news['latest']->image) }}" alt="{{ $country_news['latest']->image }}" class="w-100 top-news-image"></a>
</div>
<!-- top news -->
<div class="col-md-5 order-md-1 col-12">
    <!-- heading & description & reaction -->
    <h3 class="fw-bold mt-3 mt-md-0 top-news-heading"><a href="{{ route('news.show', $country_news['latest']->id) }}">{{ $country_news['latest']->title }}</a></h3>
    <p class="top-news-description">{{ $country_news['latest']->description }}</p>
    <div class="d-flex mt-1 mt-md-3 justify-content-end status">
        @include('user.news.feature.reaction', ['news' => $country_news['latest']])
        @include('user.news.feature.comment', ['news' => $country_news['latest']])
        @include('user.news.feature.bookmark', ['news' => $country_news['latest']])
    </div>
</div>
