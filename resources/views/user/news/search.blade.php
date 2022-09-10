@extends('layouts.app')


@section('title', 'Search')
@section('style')
<link href="{{ mix('css/search.css') }}" rel="stylesheet">
@endsection
@section('content')

  <div class="container-fluid">
    <div class="row ">
        <div class="col-md-12 result-holder">
            <h4 class="">Showing results for</h4>
            <h4 class="">Category</h4>
            <h4 class="">Country</h4>
        </div>
        
        @foreach ($all_news as $news)
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img src="{{asset('images/' . $news->image_path)}}" alt="" class="card-img-top news-img">
                <div class="card-body">
                    <p class="fw-bold h2">{{$news->title}}</p>
                    <p class="mb-0">{{$news->description}}</p>
                    <small class="text-muted">{{$news->author}}</small>
                </div>
                <div class="row align-items-center">
                    <p class="col-md-3 offset-1 fs-5">1000 <i class="fa-regular fa-thumbs-up"></i></p>
                    <p class="col-md-3 fs-5">200 <i class="fa-regular fa-thumbs-down"></i></p>
                    <p class="col-md-3 fs-5">100 <i class="fa-regular fa-comment-dots"></i></p>
                    <p class="col fs-2"><i class="fa-regular fa-bookmark"></i></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
  </div>
</div>
@endsection

