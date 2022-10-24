@extends('layouts.app')
@section('title','Like News')
@section('style')
<link href="{{ mix('css/profile.css') }}" rel="stylesheet">
@endsection
@section('script_footer')
<script src="{{ mix('js/_ajaxfollow.js') }}" defer></script>
<script src="{{ mix('js/_profile_tab.js') }}" defer></script>
<script src="{{ mix('js/_comment_delete.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    @include('user.profile.layouts.user_info')

    @if (Auth::user()->id === $user->id)
        <!-- Logged in user -->
        <!-- Liked news -->
        <div class="row mt-5" id="liked-news">
            @foreach ($liked_news as $news)
                @include('user.profile.layouts.liked_news_list')
            @endforeach
        </div>
        <!-- Bookmarked news -->
        <div class="row mt-5 d-none" id="bookmarked-news">
            @foreach ($bookmarked_news as $news)
                @include('user.profile.layouts.bookmarked_news_list')
            @endforeach
        </div>
    @else
        <!-- Other user -->
        <!-- Liked news -->
        <div class="row mt-5" id="liked-news">
            @foreach ($liked_news as $news)
                @include('user.profile.layouts.news_list')
            @endforeach
        </div>
    @endif

</div>
@endsection
@section('script')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ mix('js/update_password.js') }}" defer></script>
@endsection
