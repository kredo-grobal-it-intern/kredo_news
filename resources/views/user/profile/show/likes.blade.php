@extends('layouts.app')
@section('title','Like News')
@section('style')
<link href="{{ mix('css/news.css') }}" rel="stylesheet">
<link href="{{ mix('css/profile.css') }}" rel="stylesheet">
@endsection
@section('script_footer')
<script src="{{ mix('js/_ajaxfollow.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    @include('user.profile.layouts.user_info')

    <div class="row mt-5">
        @foreach ($liked_news as $news)
            @include('user.profile.layouts.news_list')
        @endforeach
    </div>
</div>
@endsection
