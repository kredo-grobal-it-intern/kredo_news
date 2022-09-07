@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section('content')
<div class="container">
    @include('user.news.top-body.america')
    @include('user.news.top-body.asia')
    @include('user.news.top-body.europe')
    @include('user.news.top-body.africa')
    @include('user.news.top-body.oceania')
</div>
@endsection
