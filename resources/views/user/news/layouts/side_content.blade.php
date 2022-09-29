 <li class="d-flex justify-content-between mb-4 aside-news">
    <div class="aside-news-image">
        <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}" alt="News Image" class="w-100 shadow-lg"></a>
    </div>
    <div class="aside-news-content">
        <p><a href="{{ route('news.show', $news->id) }}" class="text-dark aside-news-content-heading">{{ $news->title }}</a></p>
        <div class="d-flex justify-content-end mt-1 status">
            @include('user.news.feature.reaction')
            @include('user.news.feature.comment')
            @include('user.news.feature.bookmark')
        </div>
    </div>
 </li>
