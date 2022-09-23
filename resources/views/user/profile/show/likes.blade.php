@extends('layouts.app')
@section('title','Like News')
@section('style')
<link href="{{ mix('css/news.css') }}" rel="stylesheet">
@endsection
@section('script_footer')
<script src="{{ mix('js/_ajaxfollow.js') }}" defer></script>
@endsection
@section('content')
<div class="container">
    @include('user.profile.components.user')

    <div class="row mt-5">
        @foreach ($reactions as $reaction )
            @include('user.profile.components.news')
        @endforeach
    </div>
</div>
@endsection
