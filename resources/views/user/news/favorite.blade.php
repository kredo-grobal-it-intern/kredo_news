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
            <h2 class="header-newstitle">Media</h2>
            <br/>
            @foreach ( $sources as $source  )
                <a href="{{ route('user.news.favorite.source',['source' => $source->id]) }}" class="source_name">{{ $source->country->name }}</a>
            @endforeach
            <br/>
        </div>
        @if ($countries->count())
        <div class="col-md-12">
            <hr>
            <h2 class="header-newstitle">Country</h2>
            <br/>
            @foreach ( $countries as $country )
                <a href="{{ route('user.news.favorite.country',['country' => $country->id]) }}" class="source_name">{{ $country->name }}</a>
            @endforeach
            <br/>
        </div>
        @endif
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
