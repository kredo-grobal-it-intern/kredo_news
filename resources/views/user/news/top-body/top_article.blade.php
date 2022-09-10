<!-- top article -->
<div class="col-5">
    <!-- heading & description & reaction -->
    <h3 class="fw-bold top-heading"><a href="{{ route('news.show', $country_articles['latest']->id) }}" class="text-danger text-decoration-none">{{ $country_articles['latest']->title }}</a></h3>
    <p class="mt-3 top-description">{{ $country_articles['latest']->description }}</p>
    <p class="mt-3">
        <a href="" class="me-2 text-decoration-none text-dark">1000 <i class="fa-regular fa-thumbs-up"></i></a>
        <a href="" class="me-2 text-decoration-none text-dark">200 <i class="fa-regular fa-thumbs-down"></i></a>
        <a href="" class="me-2 text-decoration-none text-dark">100 <i class="fa-regular fa-comment-dots"></i></a>
        <a href="" class="text-decoration-none text-dark"><i class="fa-regular fa-bookmark"></i></a>
    </p>
</div>
<div class="col-7">
    <!-- article image -->
    <a href="{{ route('news.show', $country_articles['latest']->id) }}"><img src="{{ asset('images/news/' . $country_articles['latest']->image) }}" alt="{{ $country_articles['latest']->image }}" class="w-100 top-image"></a>
</div>
