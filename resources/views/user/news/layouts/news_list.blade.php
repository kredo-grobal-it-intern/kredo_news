<div class="col-lg-3 col-md-6 col-12">
    <!-- sub news -->
    <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}" alt="News Image" class="news-image w-100"></a>
    <h5 class="sub-heading fw-bold mt-3"><a href="{{ route('news.show', $news->id) }}" class="text-danger text-decoration-none">{{ $news->title }}</a></h5>
    <p class="sub-description">{{ $news->description }}</p>
    <p class="mt-1">
        <a href="" class="me-2 text-decoration-none text-dark">1000 <i class="fa-regular fa-thumbs-up"></i></a>
        <a href="" class="me-2 text-decoration-none text-dark">200 <i class="fa-regular fa-thumbs-down"></i></a>
        <a href="" class="me-2 text-decoration-none text-dark">{{ $news->comments->count() }} <i class="fa-regular fa-comment-dots"></i></a>
        <a href="" class="text-decoration-none text-dark"><i class="fa-regular fa-bookmark"></i></a>
    </p>
</div>
