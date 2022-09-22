<li class="mb-4">
    <p><a href="{{ route('news.show', $news->id) }}" class="text-dark aside-heading">{{ $news->title }}</a></p>
    <div class="d-flex justify-content-end mt-1 status">
        @include('user.news.feature.reaction')
        @include('user.news.feature.comment')
        @include('user.news.feature.bookmark')
    </div>
</li>
