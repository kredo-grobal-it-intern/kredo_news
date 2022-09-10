@extends('layouts.app')


@section('title', 'My favorite')
@section('style')
<link href="{{ mix('css/favorite.css') }}" rel="stylesheet">
@endsection
@section('content')

  <div class="container-fluid">
    <div class="row ">
        <div class="col-md-12">
            <hr>
            <h2 class="header-newstitle">News site</h2>
            <br/>
            @foreach ( $sources as $source  )
                <a href="" class="source_name">{{ $source->name }}</a>
            @endforeach
            <br/>
        </div>
        <div class="col-md-12">
            <hr>
            <h2 class="header-newstitle">Country</h2>
            <br/>
            @foreach ( $countries as $country )
                <a href="" class="source_name">{{ $country->id }}</a>
            @endforeach
            <br/>
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
                @include('user/news/feature/reaction')
            </div>
        </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
