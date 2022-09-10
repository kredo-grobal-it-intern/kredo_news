@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ mix('css/top.css') }}">
@endsection

@section('content')
<div class="container">
    @foreach ($articles as $country_name => $country_articles)
        <section class="country-section">
            <div class="text-center my-4">
                <h2 class="country fw-bold">{{ $country_name }}</h2>
            </div>

            <div class="row">
                <!-- article area -->
                <div class="col-9">
                    <!-- latest article -->
                    <div class="row top-article">
                        @include('user.news.top-body.top_article')
                    </div>
                    <!-- sub articles -->
                    <div class="row mt-5 sub-article">
                        @foreach ($country_articles['sub'] as $sub_article)
                            @include('user.news.top-body.sub_articles')
                        @endforeach
                    </div>
                </div>

                <aside class="col-3">
                    <!-- what's hot -->
                    <h3>What's hot</h3>
                    <ol>
                        @include('user.news.top-body.whats_hot')
                    </ol>
                </aside>
            </div>
        </section>
    @endforeach
</div>
@endsection
