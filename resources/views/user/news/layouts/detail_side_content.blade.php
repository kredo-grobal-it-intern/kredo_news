<li class="row mb-4">
    <div class="col-5">
        <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}" alt="News Image" class="w-100 shadow-lg aside-image"></a>
    </div>
    <div class="col-7">
        <p><a href="{{ route('news.show', $news->id) }}" class="text-dark aside-heading">{{ $news->title }}</a></p>
        <p class="text-end">
            <a href="" class="me-2 text-decoration-none text-dark">1000 <i class="fa-regular fa-thumbs-up"></i></a>
            <a href="" class="me-2 text-decoration-none text-dark">200 <i class="fa-regular fa-thumbs-down"></i></a>
            <a href="" class="me-2 text-decoration-none text-dark">{{ $news->comments->count() }} <i class="fa-regular fa-comment-dots"></i></a>
            <a href="" class="text-decoration-none text-dark"><i class="fa-regular fa-bookmark"></i></a>
        </p>
    </div>
</li>
