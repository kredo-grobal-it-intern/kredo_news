 <li class="mb-4">
        <p><a href="{{ route('news.show', $news->id) }}" class="text-dark aside-heading">{{ $news->title }}</a></p>
        <div><a href="{{ route('news.show', $country_news['latest']->id) }}"><img src="{{ asset('images/news/' . $news->image) }}" alt="{{ $news->image }}" class="w-100 aside-image"></a>
        </div>
        <div class="d-flex justify-content-end mt-1 status">
            @include('user.news.feature.reaction')
            @include('user.news.feature.comment')
            @include('user.news.feature.bookmark')
        </div>
 </li>
