@extends('layouts.app')
@section('title','Like News')
<link href="{{ mix('css/news.css') }}" rel="stylesheet">
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
