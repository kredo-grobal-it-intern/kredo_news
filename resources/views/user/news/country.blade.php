@extends('layouts.app')
@section('style')
<link href="{{ mix('css/country.css') }}" rel="stylesheet">
<link href="{{ mix('css/news_list.css') }}" rel="stylesheet">
@endsection
@section('title',"$country->name Category")
@section('content')
<div class="container">
    <div class="row justify-content-center back">
        @if ($country->image)
        <img src="{{asset('images/countries/' . $country->image)}}" alt="{{$country->name}}">
        @else
        <img src="{{asset('images/country.jpg')}}" alt="{{$country->name}}">
        @endif
        <h1 class="text-center fw-bold country_title">{{$country->name}}</h1>
    </div>
</div>
<div class="container">
    <div class="row mt-4">
        @foreach ($all_news as $news)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                @if($news->image_path)
                <img src="{{asset('images/' . $news->image_path)}}" alt="" class="card-img-top news-img">
                @else
                <img src="{{asset('images/no_image.png')}}" alt="" class="card-img-top news-img">
                @endif
                <div class="card-body">
                    <p class="fw-bold h2">{{$news->title}}</p>
                    <p class="mb-0">{{$news->description}}</p>
                    <small class="text-muted">{{$news->author}}</small>
                </div>
                <div class="row align-items-center">
                    @include('user/news/feature/reaction')
                    @include('user/news/feature/bookmark')
                </div>
            </div>
        </div>
    </div>
            @include('user.news.layouts.news_list')
        @endforeach
    </div>
</div>
@endsection
