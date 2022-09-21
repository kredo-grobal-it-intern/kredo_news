<!-- top news -->
<div class="col-5">
    <!-- heading & description & reaction -->
    <h3 class="fw-bold top-heading"><a href="{{ route('news.show', $country_news['latest']->id) }}" class="text-danger text-decoration-none">{{ $country_news['latest']->title }}</a></h3>
    <p class="mt-3 top-description">{{ $country_news['latest']->description }}</p>
    <div class="d-flex mt-3 status">
        @include('user.news.feature.reaction', ['news' => $country_news['latest']])
        @include('user.news.feature.comment', ['news' => $country_news['latest']])
        @include('user.news.feature.bookmark', ['news' => $country_news['latest']])
    </div>
</div>
<div class="col-7">
    <!-- news image -->
    <a href="{{ route('news.show', $country_news['latest']->id) }}"><img src="{{ asset('images/news/' . $country_news['latest']->image) }}" alt="{{ $country_news['latest']->image }}" class="w-100 top-image"></a>
</div>
