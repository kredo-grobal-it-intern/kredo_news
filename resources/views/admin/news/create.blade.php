@extends('layouts.admin')

@section('title', 'Create News')

@section('style')
<link href="{{ mix('css/admin/create.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('admin.news.layouts.create')
@endsection
