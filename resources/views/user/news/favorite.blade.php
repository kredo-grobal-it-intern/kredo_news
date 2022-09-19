@extends('layouts.app')
@section('title', 'My favorite')
@section('style')
<link href="{{ mix('css/favorite.css') }}" rel="stylesheet">
<link href="{{ mix('css/news_list.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    <!-- Favorite media section -->
    @if ($sources->count())
        <section class="favorite-list text-center mb-4">
            <h2 class="favorite-header d-flex align-items-center mb-3">Media</h2>
            @foreach ( $sources as $source  )
                <a href="{{ route('user.news.favorite.source',['source' => $source->id]) }}" class="favorite-name">{{ $source->country->name }}</a>
            @endforeach
        </section>
    @endif
    <!-- Favorite country section -->
    @if ($countries->count())
        <section class="favorite-list text-center mb-5">
            <h2 class="favorite-header d-flex align-items-center mb-3">Country</h2>
            @foreach ( $countries as $country )
                <a href="{{ route('user.news.favorite.country',['country' => $country->id]) }}" class="favorite-name">{{ $country->name }}</a>
            @endforeach
        </section>
    @endif
    <!-- News section -->
    <div class="row mt-4">
        @foreach ($all_news as $news)
            @include('user.news.layouts.news_list')
        @endforeach
    </div>
</div>
@endsection
