@extends('layouts.app')
@section('style')
<link href="{{ mix('css/filtered_page.css') }}" rel="stylesheet">
<link href="{{ mix('css/news_list.css') }}" rel="stylesheet">
@endsection
@section('title', "$category->name Category")
@section('content')
<div class="container">
    <div class="header-section">
        <img src="{{asset('images/categories/' . $category->image)}}" alt="{{$category->name}}" class="header-section-image">
        <h1 class="text-center fw-bold header-section-title">{{$category->name}}</h1>
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
