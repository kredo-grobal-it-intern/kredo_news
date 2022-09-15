@extends('layouts.app')
@section('title','Like News')
<link href="{{ mix('css/news.css') }}" rel="stylesheet">
@section('content')
<div class="container justify-content-center mx-5">
    @include('user.profile.components.user')

    <div class="row mt-5">
        @foreach ($reactions as $all_news )
            @include('user.profile.components.news')
        @endforeach
    </div>
</div>
@endsection
