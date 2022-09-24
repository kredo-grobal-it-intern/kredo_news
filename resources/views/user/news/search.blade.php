@extends('layouts.app')

@section('title', 'Search')

@section('style')
<link href="{{ mix('css/search.css') }}" rel="stylesheet">
<link href="{{ mix('css/news_list.css') }}" rel="stylesheet">
@endsection
@section('content')

  <div class="container">
    <div class="my-2">
        <h4 class="">Showing "<span>{{ $news_count }}</span>" articles searched by "<span>{{ $keyword }}</span>"</h4>
        @isset($selected_category)
            <h4 class="">Category: &nbsp;"<span>{{ $selected_category->name }}</span>"</h4>
        @endisset
        @if($selected_countries->isNotEmpty())
            <h4 class="">Country: &nbsp;
                @foreach ($selected_countries as $country)
                    "<span>{{ $country->name }}</span>" &nbsp;
                @endforeach
            </h4>
        @endif
    </div>

    <div class="row mt-4">
        @foreach ($searched_news_array as $news)
            @include('user.news.layouts.news_list')
        @endforeach
    </div>
  </div>
@endsection
