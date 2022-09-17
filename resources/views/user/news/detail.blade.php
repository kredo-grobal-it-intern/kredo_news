@extends('layouts.app')
@section('title','NEWS')
@section('style')
<link rel="stylesheet" href="{{ mix('css/detail.css') }}">
@endsection
@section('content')
<div class="container my-4">
    <!-- News header -->
    <div class="news-header">
        <h2 class="text-decoration-underline fw-bold"> {{ $news->title }}</h2>
        <p>News site: &nbsp;{{ $news->source->name }}</p>
        <p>Published: &nbsp;{{ $news->published_at }}</p>
        <p class="fw-bold"> {{ $news->author }}</p>
    </div>
    <div class="row">
        <!-- Main content -->
        <div class="col-8">
            <!-- News section -->
            <section class="mb-5">
                <div class="image-area mb-5 pe-3">
                    <img src="{{ asset('images/news/' . $news->image) }}" alt="News Image" class="w-100 detail-image">
                </div>
                <div class="news-content px-3">
                    <p>{{ $news->content }}</p>
                    <p>URL: &nbsp;<a href="{{ $news->url }}" class="text-dark">{{ $news->url }}</a></p>
                </div>
            </section>
            <!-- Comment section -->
            <section>
                <h4 class="fw-bold pb-2 mb-2 comment-title">Comments</h4>
                <ul class="comment-list px-3">
                    @foreach ($news->comments->take(5) as $comment)
                        <li class="row comment-list-item pt-4 pb-3">
                            <div class="col-1">
                                @if ($comment->user->avatar)
                                    <a href="{{ route('user.profile.show', $comment->user->id) }}" class="text-decoration-none text-muted"><img src="{{ asset('images/avatars/' . $comment->user->avatar) }}" alt="User Avatar" class="avatar"></a>
                                @else
                                    <a href="{{ route('user.profile.show', $comment->user->id) }}" class="text-decoration-none text-muted"><i class="fa-solid fa-circle-user fa-2x profile-icon"></i></a>
                                @endif
                            </div>
                            <div class="col-11">
                                <!-- Comment header -->
                                <div class="profile">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="fw-bold"><a href="{{ route('user.profile.show', $comment->user->id) }}" class="username text-dark">{{ $comment->user->username }}</a></h6>
                                        <div class="reaction-area text-end">
                                            @auth
                                                @if ($comment->user_id === Auth::user()->id)
                                                    <form action="{{ route('user.comment.destroy', $comment->id) }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                            <button type="submit" class="comment-delete text-danger border-0 bg-transparent">Delete</button>
                                                    </form>
                                                @endif
                                            @endauth
                                            <a href="" class="me-2 text-decoration-none text-dark">1000 <i class="fa-regular fa-thumbs-up"></i></a>
                                            <a href="" class="me-2 text-decoration-none text-dark">200 <i class="fa-regular fa-thumbs-down"></i></a>
                                        </div>
                                    </div>
                                    <small class="text-muted">Soccer player / Musician / Science</small>
                                </div>
                                <!-- Comment body -->
                                <div class="comment-content mt-3">
                                    <p>{{ $comment->body }}</p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <p class="view-all text-end"><a href="" class="text-dark">View All Comments</a></p>
                <form action="{{ route('user.comment.store', $news->id) }}" method="post">
                    @csrf
                    <div class="mb-3 mt-5">
                        <textarea class="form-control mt-3" name="comment" id="comment" rows="5">{{ old('comment') }}</textarea>
                        @error('comment')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <button type="submit" class="btn btn-outline-secondary btn-sm mt-2 float-end">Post Comment</button>
                    </div>
                </form>
            </section>
        </div>
        <!-- Side content -->
        <aside class="col-4">
            <!-- What's hot -->
            <section class="mb-5">
                <h3 class="aside-title pb-2 mb-4">What's hot</h3>
                <ol>
                    @foreach ($whats_hot_news as $news)
                        @include('user.news.layouts.detail_side_content')
                    @endforeach
                </ol>
            </section>
            <!-- Latest in -->
            <section>
                <h3 class="aside-title pb-2 mb-4">Latest in</h3>
                <ol>
                    @foreach ($latest_news as $news)
                        @include('user.news.layouts.detail_side_content')
                    @endforeach
                </ol>
            </section>
        </aside>
    </div>
</div>
@endsection
