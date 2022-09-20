@extends('layouts.app')
@section('style')
<link href="{{ mix('css/country.css') }}" rel="stylesheet">
<link href="{{ mix('css/news_list.css') }}" rel="stylesheet">
@endsection
@section('title',"Media" . $media->country->name)
@section('content')
<div class="container">
    <div class="row justify-content-center back">
        @if ($media->country->image)
        <img src="{{asset('images/countries/' . $media->country->image)}}" alt="{{$media->country->name}}">
        @else
        <img src="{{asset('images/country.jpg')}}" alt="{{$media->country->name}}">
        @endif
        <h1 class="text-center fw-bold country_title">{{$media->country->name}}</h1>
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
