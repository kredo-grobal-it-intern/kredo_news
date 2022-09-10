<div class="col-3">
    <!-- sub article -->
    <a href="{{ route('news.show', $sub_article->id) }}"><img src="{{ asset('images/news/' . $sub_article->image) }}" alt="Article Image" class="sub-image w-100"></a>
    <h5 class="sub-heading fw-bold mt-3"><a href="{{ route('news.show', $sub_article->id) }}" class="text-danger text-decoration-none">{{ $sub_article->title }}</a></h5>
    <p class="sub-description">{{ $sub_article->description }}</p>
    <p class="mt-1">
        <a href="" class="me-2 text-decoration-none text-dark">1000 <i class="fa-regular fa-thumbs-up"></i></a>
        <a href="" class="me-2 text-decoration-none text-dark">200 <i class="fa-regular fa-thumbs-down"></i></a>
        <a href="" class="me-2 text-decoration-none text-dark">100 <i class="fa-regular fa-comment-dots"></i></a>
        <a href="" class="text-decoration-none text-dark"><i class="fa-regular fa-bookmark"></i></a>
    </p>
</div>
