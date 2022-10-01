@extends('layouts.app')
@section('title','Like News')
@section('style')
<link href="{{ mix('css/profile.css') }}" rel="stylesheet">
@endsection
@section('script_footer')
<script src="{{ mix('js/_ajaxfollow.js') }}" defer></script>
<script src="{{ mix('js/_profile_tab.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    @include('user.profile.layouts.user_info')

    <div class="row mt-5" id="liked-news">
        @foreach ($liked_news as $news)
            @include('user.profile.layouts.news_list')
        @endforeach
    </div>

    @if (Auth::user()->id === $user->id)
        <div class="row mt-5 d-none" id="bookmarked-news">
            @foreach ($bookmarked_news as $news)
                @include('user.profile.layouts.news_list')
            @endforeach
        </div>
    @endif
</div>
@endsection
