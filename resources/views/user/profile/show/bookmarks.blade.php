@extends('layouts.app')
@section('title','Bookmark News')
@section('style')
<link href="{{ mix('css/news.css') }}" rel="stylesheet">
<link href="{{ mix('css/profile.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="container">
    @include('user.profile.components.user')

    <div class="row mt-5">
        @foreach ($bookmarks as $reaction )
            @include('user.profile.components.news')
        @endforeach
    </div>
</div>
@endsection