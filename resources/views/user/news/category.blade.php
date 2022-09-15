@extends('layouts.app')
@section('style')
<link href="{{ mix('css/category.css') }}" rel="stylesheet">
@endsection
@section('title',"$category->name Category")
@section('content')
<div class="container">
    <div class="row justify-content-center back">
        <img src="{{asset('images/' . $category->image)}}" alt="{{$category->name}}">
        <h1 class="text-center fw-bold category_title">{{$category->name}}</h1>
    </div>
</div>
<div class="container-fluid">
    <div class="row ">
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
                @include('user/news/feature/reaction')
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
