@extends('layouts.app')
@section('title','NEWS')
@section('content')
<div class="container justify-content-center mx-5">
    <div class="row mt-5">
        <div class="col-md-4">
            @if ($user->avatar)
            <img src="{{asset('/storage/avatars/'.$user->avatar)}}" alt="" class="rounded-circle nav-avatar ps-3" style="width:40%; height:130px">
            @else
            <i class="fa-solid fa-circle-user text-secondary d-block text-center profile-icon"></i>
            @endif
        </div>
        <div class="col-8">
            <div class="row my-3">
                <h2 class="fw-bold">Username</h2>
                @if (Auth::user()->id === $user->id)
                    <a href="{{route('user.profile.edit')}}" class="text-decoration-none text-secondary">Edit Profile</a>
                @endif
            </div>
                <div class="row">
                    <div class="col-3">
                        <button type="button" class="btn border-0 fs-5 m-0 p-0" data-bs-toggle="modal" data-bs-target="#follower">
                            <span class="fw-bold fs-4">10</span> Comments
                        </button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn border-0 fs-5 m-0 p-0" data-bs-toggle="modal" data-bs-target="#follower">
                            <span class="fw-bold fs-4">{{ $user->followers->count() }}</span> Followers
                        </button>
                    @include('user.profile.modal.follower')
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn border-0 fs-5 m-0 p-0" data-bs-toggle="modal" data-bs-target="#following">
                            <span class="fw-bold fs-4">{{ $user->followings->count() }}</span> Followings
                        </button>
                        @include('user.profile.modal.following')
                    </div>
                </div>
                <div class="row my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia qui corporis dolorum, rerum debitis tempora? Modi consequuntur non magni aliquid.
                </div>
                <a href="#" class="btn btn-secondary me-3">News Liked by Username</a>
                <a href="#" class="btn btn-secondary">Bookmarks</a>
            </div>
        </div>
    </div>

    <div class="row mt-5 ps-2">
        @foreach ( $all_news as $news)
        <div class="col-3 mb-5">
            @if ($news->image_path === null)
                <img src="{{ asset('images/dummy.jpg') }}" alt="NO IMAGE" style="width:300px; height:300px">
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
