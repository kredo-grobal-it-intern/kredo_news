@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ mix('css/top.css') }}">
@endsection

@section('content')
<div class="container">
    @foreach ($news_list as $country_name => $country_news)
        @isset($country_news['latest']) <!-- tentative condition -->
            <section class="country-section">
                <div class="text-center my-4">
                    <h2 class="country fw-bold">{{ $country_name }}</h2>
                </div>

                <div class="row">
                    <!-- news area -->
                    <div class="col-9">
                        <!-- latest news -->
                        <div class="row top-news">
                            @include('user.news.layouts.top_news')
                        </div>
                        <!-- sub news -->
                        <div class="row mt-5 news-list">
                            @foreach ($country_news['list'] as $news)
                                @include('user.news.layouts.news_list')
                            @endforeach
                        </div>
                    </div>

                    <aside class="col-3">
                        <!-- what's hot -->
                        <h3>What's hot</h3>
                        <ol>
                            @foreach ($whats_hot_news[$country_name] as $news)
                                @include('user.news.layouts.whats_hot')
                            @endforeach
                        </ol>
                    </aside>
                </div>
            </section>
        @endisset
    @endforeach
</div>
@endsection
