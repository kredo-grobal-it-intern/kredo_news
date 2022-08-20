@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($all_news as $news)
                <div class="card">
                    @if ($news->image_path === null)
                        <img src="{{ asset('images/no_image.png') }}" alt="NO IMAGE">
                    @else
                        <img src="{{ asset('storage/images/' . $news->image_path) }}" alt="News Image">
                    @endif
                    <p>Title: {{ $news->title }}</p>
                    <p>Description: {{ $news->description }}</p>
                    <p>Content: {{ $news->content }}</p>
                    <p>Author: {{ $news->author }}</p>
                    <p>Link: {{ $news->url }}</p>
                    <p>Published At: {{ $news->published_at }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
