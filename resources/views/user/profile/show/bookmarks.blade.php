@extends('layouts.app')
@section('title','Bookmark News')
@section('style')
<link href="{{ mix('css/news.css') }}" rel="stylesheet">
<link href="{{ mix('css/profile.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    @include('user.profile.layouts.user_info')

    <div class="row mt-5">
        @foreach ($bookmarked_news as $news)
            @include('user.profile.layouts.news_list')
        @endforeach
    </div>
</div>
@endsection