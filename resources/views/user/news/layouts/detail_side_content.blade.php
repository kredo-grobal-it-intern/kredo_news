<li class="row  aside-news">
    <div class="col-5">
        <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}" alt="News Image" class="w-100 shadow-lg aside-image"></a>
    </div>
    <div class="col-7">
        <p><a href="{{ route('news.show', $news->id) }}" class="text-dark aside-heading">{{ $news->title }}</a></p>
        <div class="d-flex justify-content-end mt-1 status">
            @include('user.news.feature.reaction')
            @include('user.news.feature.comment')
            @include('user.news.feature.bookmark')
        </div>
    </div>
</li>
