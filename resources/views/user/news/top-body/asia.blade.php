<section class="country-section">
    <div class="text-center my-4">
        <h2 class="country fw-bold">Asia</h2>
    </div>

    <div class="row">
        <div class="col-9">
            <!-- article -->
            <div class="row top-article">
                <!-- top article -->
                <div class="col-5">
                    <!-- heading & description & reaction -->
                    <h3 class="fw-bold top-heading"><a href="" class="text-danger text-decoration-none">{{ $articles['asia']['latest']->title }}</a></h3>
                    <p class="mt-3 top-description">{{ $articles['asia']['latest']->description }}</p>
                    <p class="mt-3">
                        <a href="" class="me-2 text-decoration-none text-dark">1000 <i class="fa-regular fa-thumbs-up"></i></a>
                        <a href="" class="me-2 text-decoration-none text-dark">200 <i class="fa-regular fa-thumbs-down"></i></a>
                        <a href="" class="me-2 text-decoration-none text-dark">100 <i class="fa-regular fa-comment-dots"></i></a>
                        <a href="" class="text-decoration-none text-dark"><i class="fa-regular fa-bookmark"></i></a>
                    </p>
                </div>
                <div class="col-7">
                    <!-- article image -->
                    <a href=""><img src="{{ asset('images/news/' . $articles['asia']['latest']->image) }}" alt="{{ $articles['asia']['latest']->image }}" class="w-100 top-image"></a>
                </div>
            </div>

            <div class="row mt-5 sub-article">
                @foreach ($articles['asia']['sub'] as $article)
                    @include('user.news.top-body.components.sub_articles')
                @endforeach
            </div>
        </div>

        <aside class="col-3">
            <!-- what's hot -->
            <h3>What's hot</h3>

            <ol>
                @include('user.news.top-body.components.whats_hot')
            </ol>
        </aside>
    </div>
</section>
