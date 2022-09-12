@extends('layouts.app')
@section('title','NEWS')
@section('content')
<div class="row justify-content-center">
    <div class="col-8">
        <div class="card ms-5 border-0 bg-transparent">
            <div class="card-header bg-transparent border-bottom-0">
{{-- Left side: News --}}
                <h1 class="text-decoration-underline fw-bold"> {{$news->title}}</h1>
                <div class="row m-0 py-0">
                    <p>News site: {{$news->source_name}}</p>
                </div>
                <div class="row m-0 py-0">
                    <p>Published: {{$news->published_at}}</p>
                </div>
                <div class="row m-0 py-0">
                    <p class="fw-bold"> {{$news->author}}</p>
                </div>
            </div>

            <div class="card-body justify-content-center mx-auto">
                <img src="{{ asset('storage/images/dummy.jpg') }}" alt="">
                <p>caption for image? description?</p>
                <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum nisi fugiat ad similique et placeat neque. Aliquam nulla odit assumenda dignissimos sit quibusdam, optio ab delectus maxime fugit esse adipisci.
                </p>
                <p>
                    URL: {{$news->url}}
                </p>
{{-- Comments section --}}
                <div class="fw-bold mt-5"> Comment</div>
                @foreach($comments as $comment)
                    <div class="row mt-3">
                        <div class="col-2">
                            {{-- avatar --}}
                            <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
                        </div>
                        <div class="col-9">
                        {{-- comment --}}
                            {{ $comment->body }}
                        </div>
                        <div class="col-1 pe-2">
                            @auth
                                @if ($comment->user_id === Auth::user()->id)
                                    <form action="{{ route('user.comment.destroy', $comment->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                @endif
                            @endauth
                            <i class="fa-solid fa-ellipsis"></i>
                            <a href="" class="me-2 text-decoration-none text-dark">1000 <i class="fa-regular fa-thumbs-up"></i></a>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <form action="{{ route('user.comment.store', $news->id) }}" method="post">
                    @csrf
                    <div class="mb-3 mt-5">
                        <textarea class="form-control mt-3" name="comment" id="comment" rows="3"></textarea>
                        <button type="submit" class="btn btn-outline-secondary btn-sm mt-2 float-end">Post Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{-- Right side --}}
    <div class="col-4">
        <div class="card-body me-3">
{{-- Whats hot --}}
        <hr>
            <h2 class="fw-bold text-decoration-underline">What's Hot</h2>
        <hr>
        @include('user.news.top-body.whats_hot')
{{-- latest in --}}
        <hr>
            <h2 class="fw-bold text-decoration-underline">Latest In <span class="fw-bold">{{$news->source_name}}</span></h2>
        <hr>
        <div class="row">
            <div class="col">
                <p class="text-decoration-underline fw-bold"> {{$news->title}}</p>
                <p>
                    <a href="" class="me-2 text-decoration-none text-dark">1000 <i class="fa-regular fa-thumbs-up"></i></a>
                    <a href="" class="me-2 text-decoration-none text-dark">200 <i class="fa-regular fa-thumbs-down"></i></a>
                    <a href="" class="me-2 text-decoration-none text-dark">100 <i class="fa-regular fa-comment-dots"></i></a>
                    <a href="" class="text-decoration-none text-dark"><i class="fa-regular fa-bookmark"></i></a>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <p class="text-decoration-underline fw-bold"> {{$news->title}}</p>
                <p>
                    <a href="" class="me-2 text-decoration-none text-dark">1000 <i class="fa-regular fa-thumbs-up"></i></a>
                    <a href="" class="me-2 text-decoration-none text-dark">200 <i class="fa-regular fa-thumbs-down"></i></a>
                    <a href="" class="me-2 text-decoration-none text-dark">100 <i class="fa-regular fa-comment-dots"></i></a>
                    <a href="" class="text-decoration-none text-dark"><i class="fa-regular fa-bookmark"></i></a>
                </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <p class="text-decoration-underline fw-bold"> {{$news->title}}</p>
                <p>
                    <a href="" class="me-2 text-decoration-none text-dark">1000 <i class="fa-regular fa-thumbs-up"></i></a>
                    <a href="" class="me-2 text-decoration-none text-dark">200 <i class="fa-regular fa-thumbs-down"></i></a>
                    <a href="" class="me-2 text-decoration-none text-dark">100 <i class="fa-regular fa-comment-dots"></i></a>
                    <a href="" class="text-decoration-none text-dark"><i class="fa-regular fa-bookmark"></i></a>
                </p>
                </div>
            </div>
        </div>
        <hr>
        </div>
    </div>
</div>
@endsection
