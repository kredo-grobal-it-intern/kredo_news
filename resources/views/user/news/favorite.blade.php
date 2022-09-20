@extends('layouts.app')
@section('title', 'My Favorite')
@section('style')
<link href="{{ mix('css/favorite.css') }}" rel="stylesheet">
<link href="{{ mix('css/news_list.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    @if (Session::has('favorite_none'))
        <div class="flash-message bg-danger text-white text-center h5 py-3 my-0">
            {{ session('favorite_none') }}
        </div>
    @endif
    <!-- Favorite media section -->
    @if ($sources->count())
        <section class="favorite-list text-center mb-4">
            <h2 class="favorite-header d-flex align-items-center mb-3">Media</h2>
            @foreach ( $sources as $source  )
                <a href="{{ route('user.news.favorite.source', $source->id) }}" class="favorite-name">
                    @if (isset($selected_source) && $source->id == $selected_source)
                        <i class="fa-solid fa-star"></i>
                    @endif
                    {{ $source->country->name }}
                </a>
            @endforeach
        </section>
    @endif
    <!-- Favorite country section -->
    @if ($countries->count())
        <section class="favorite-list text-center mb-3">
            <h2 class="favorite-header d-flex align-items-center mb-3">Country</h2>
            @foreach ( $countries as $country )
                <a href="{{ route('user.news.favorite.country', $country->id) }}" class="favorite-name">
                    @if (isset($selected_country) && $country->id == $selected_country)
                        <i class="fa-solid fa-star"></i>
                    @endif
                    {{ $country->name }}
                </a>
            @endforeach
        </section>
    @endif
    <!-- Edit profile link -->
    <div class="text-end mt-3">
        <a href="{{ route('user.profile.edit') }}" class="favorite-edit"><i class="fa-solid fa-arrow-up-right-from-square me-2"></i>Edit your favorite</a>
    </div>
    <!-- News section -->
    <div class="row mt-4">
        @foreach ($favorite_news as $news)
            @include('user.news.layouts.news_list')
        @endforeach
    </div>
</div>
@endsection
