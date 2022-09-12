@extends('layouts.app')
@section('style')
<link href="{{ mix('css/country.css') }}" rel="stylesheet">
@endsection
@section('title',"$media->name Media")
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
<div class="container-fluid">
    <div class="row mt-5">
        @foreach ($all_news as $news)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                @if($news->image)
                <img src="{{asset('images/countries/' . $news->image)}}" alt="" class="card-img-top news-img">
                @else
                <img src="{{asset('images/no_image.png')}}" alt="" class="card-img-top news-img">
                @endif
                <div class="card-body">
                    <p class="fw-bold h2">{{$news->title}}</p>
                    <p class="mb-0">{{$news->description}}</p>
                    <small class="text-muted">{{$news->author}}</small>
                </div>
                <div class="row align-items-center">
                    <p class="col offset-1 fs-5">1000 <i class="fa-regular fa-thumbs-up"></i></p>
                    <p class="col fs-5">200 <i class="fa-regular fa-thumbs-down"></i></p>
                    <p class="col fs-5">100 <i class="fa-regular fa-comment-dots"></i></p>
                    <p class="col offset-1 fs-2"><i class="fa-regular fa-bookmark"></i></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
