@extends('layouts.app')
@section('title','Like News')
@section('style')
<link href="{{ mix('css/profile.css') }}" rel="stylesheet">
@endsection
@section('script_footer')
<script src="{{ mix('js/_ajaxfollow.js') }}" defer></script>
<script src="{{ mix('js/_profile_tab.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    @include('user.profile.layouts.user_info')

    @if (Auth::user()->id === $user->id)
        <!-- Logged in user -->
        <div class="row mt-5" id="liked-news">
            @foreach ($liked_news as $news)
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card">
                        @if ($news->image)
                            <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}"
                                    alt="" class="card-img-top news-list-img"></a>
                        @else
                            <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/country.webp') }}"
                                    alt="{{ $news->country->name }}" class="card-img-top news-list-img"></a>
                        @endif
                        <div class="card-body">
                            <p class="fw-bold news-list-title"><a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a></p>
                            <p class="mb-0 news-list-description">{{ $news->description }}</p>
                            <small class="text-muted news-list-author">{{ $news->author }}</small>
                            <div class="d-flex mt-1 justify-content-end status">
                                <p class="reaction">
                                    <span class="upCount">{{ number_format($news->getLike()->count()) }}</span>
                                    <i class="fa-regular fa-thumbs-up up-toggle text-primary" data-newsid="{{ $news->id }}"></i>
                                </p>
                                <p class="reaction">
                                    <span class="downCount">{{ number_format($news->getDislike()->count()) }}</span>
                                    <i class="fa-regular fa-thumbs-down down-toggle" data-newsid="{{ $news->id }}"></i>
                                </p>
                                <p class="comment">
                                    {{ number_format($news->comments_count) }} <i class="fa-regular fa-comment-dots"></i>
                                </p>
                                @include('user.news.feature.bookmark')
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span class="news-list-clock"><i class="fa-regular fa-clock"></i>
                                        {{ date('n/j(D)', strtotime($news->post_date)) }}</span>
                                </div>
                                <div>
                                    <span class="badge bg-opacity-50 news-list-badge">{{ $news->country->name }}</span>
                                    <span class="badge bg-opacity-50 news-list-badge">{{ $news->category->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row mt-5 d-none" id="bookmarked-news">
            @foreach ($bookmarked_news as $news)
                <div class="col-xl-3 col-lg-4 col-md-6 col-12 mb-4">
                    <div class="card">
                        @if ($news->image)
                            <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/news/' . $news->image) }}"
                                    alt="" class="card-img-top news-list-img"></a>
                        @else
                            <a href="{{ route('news.show', $news->id) }}"><img src="{{ asset('images/country.webp') }}"
                                    alt="{{ $news->country->name }}" class="card-img-top news-list-img"></a>
                        @endif
                        <div class="card-body">
                            <p class="fw-bold news-list-title"><a href="{{ route('news.show', $news->id) }}">{{ $news->title }}</a></p>
                            <p class="mb-0 news-list-description">{{ $news->description }}</p>
                            <small class="text-muted news-list-author">{{ $news->author }}</small>
                            <div class="d-flex mt-1 justify-content-end status">
                                @include('user.news.feature.reaction')
                                <p class="comment">
                                    {{ number_format($news->comments_count) }} <i class="fa-regular fa-comment-dots"></i>
                                </p>
                                <p class="bookmark">
                                    <i class="fa-solid fa-bookmark bookmark-toggle text-success" data-newsid="{{ $news->id }}"></i>
                                </p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <span class="news-list-clock"><i class="fa-regular fa-clock"></i>
                                        {{ date('n/j(D)', strtotime($news->post_date)) }}</span>
                                </div>
                                <div>
                                    <span class="badge bg-opacity-50 news-list-badge">{{ $news->country->name }}</span>
                                    <span class="badge bg-opacity-50 news-list-badge">{{ $news->category->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else

        <!-- Other user -->
        <div class="row mt-5" id="liked-news">
            @foreach ($liked_news as $news)
                @include('user.profile.layouts.news_list')
            @endforeach
        </div>

    @endif

</div>
@endsection
