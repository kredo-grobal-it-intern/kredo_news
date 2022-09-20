<div class="col-lg-3 col-md-6 col-12">
    <!-- sub news -->
    <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}" alt="News Image" class="news-list-image w-100"></a>
    <h5 class="sub-heading fw-bold mt-3"><a href="{{ route('news.show', $news->id) }}" class="text-danger text-decoration-none">{{ $news->title }}</a></h5>
    <p class="sub-description">{{ $news->description }}</p>
    <div class="d-flex mt-1 status">
        @include('user.news.feature.reaction')
        @include('user.news.feature.comment')
        @include('user.news.feature.bookmark')
    </div>
</div>
