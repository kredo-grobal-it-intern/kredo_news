@extends('layouts.app')
@section('style')
    <link href="{{ mix('css/filtered_page.css') }}" rel="stylesheet">
    <link href="{{ mix('css/news_list.css') }}" rel="stylesheet">
@endsection
@section('title', "$country->name Country")
@section('content')
    <div class="container">
        <div class="header-section">
            @if ($country->image)
                <img src="{{ asset('images/countries/' . $country->image) }}" alt="{{ $country->name }}" class="header-section-image">
            @else
                <img src="{{ asset('images/country.webp') }}" alt="{{ $country->name }}" class="header-section-image">
            @endif
            <h1 class="text-center fw-bold header-section-title">{{ $country->name }}</h1>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4">
            @foreach ($all_news as $news)
                @include('user.news.layouts.news_list')
            @endforeach
        </div>
    </div>
@endsection
