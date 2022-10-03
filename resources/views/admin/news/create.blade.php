@extends('layouts.app')

@section('title', 'Create News')
@section('script_footer')
    <script src="{{ mix('js/editor.js') }}"></script>
    <script src="{{ mix('js/_createnews.js') }}"></script>
@endsection

@section('style')
<link href="{{ mix('css/admin/create.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('admin.news.layouts.create')
@endsection
