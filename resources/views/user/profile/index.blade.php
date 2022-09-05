@extends('layouts.app')
@section('title','NEWS')
@section('content')
<div class="container justify-content-center mx-5">
    <div class="row mt-5">
        <div class="col-md-4">
            <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
        </div>
        <div class="col-8">
            <div class="row my-3"><h2 class="fw-bold">Username</h2></div>
                <div class="row fw-bold">
                    <div class="col">68 Comments</div>
                    <div class="col">100 Follower</div>
                    <div class="col">50 Follow</div>
                </div>
                <div class="row my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia qui corporis dolorum, rerum debitis tempora? Modi consequuntur non magni aliquid.
                </div>
                <a href="#" class="btn btn-secondary me-3">News Liked by Username</a>
                <a href="#" class="btn btn-secondary">Bookmarks</a>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        @foreach ( $all_news as $news)
        <div class="col-3 mb-5">
            @if ($news->image_path === null)
                <img src="{{ asset('images/no_image.png') }}" alt="NO IMAGE" style="width:300px; height:300px">
            @else
                <img src="{{ asset('storage/images/' . $news->image_path) }}" alt="News Image" style="width:300px; height:300px">
            @endif

            <div class="col-3 badge bg-secondary bg-opacity-50">UK</div>
            <div class="col-3 badge bg-secondary bg-opacity-50">Food</div>
            <h4 class="fw-bold text-decoration-underline my-3">{{$news->title}}</h4>
            <div class="row">
                <div class="col"><i class="fa-solid fa-thumbs-up text-secondary">100</i></div>
                <div class="col"><i class="fa-solid fa-thumbs-down text-secondary">50</i></div>
                <div class="col"><i class="fa-solid fa-comment-dots text-secondary">70</i></div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
