@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
        <div class="row justify-content-center text-primary">
            <div class="col-3">
                <div class="card text-center pb-0">
                <div class="card-body py-3 display-5 fw-bold">{{ number_format($news->whereNull('deleted_at')->count()) }}</div>
                <div class="card-footer bg-white">
                    <a href="{{ route('admin.news.show') }}" class="text-decoration-none fs-2">News</a>
                </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center pb-0">
                <div class="card-body  py-3 display-5 fw-bold">{{ number_format($users->whereNull('deleted_at')->count()) }}</div>
                <div class="card-footer bg-white">
                    <a href="{{ route('admin.users.show') }}" class="text-decoration-none fs-2">Users</a>
                </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center pb-0">
                <div class="card-body  py-3 display-5 fw-bold">{{ number_format($comments->whereNull('deleted_at')->count()) }}</div>
                <div class="card-footer bg-white">
                    <a href="{{ route('admin.comments.show') }}" class="text-decoration-none fs-2">Comments</a>
                </div>
                </div>
            </div>
            </div>

            <div class="row justify-content-center mt-4 text-danger">
            <div class="col-3">
                <div class="card text-center pb-0 bg-light">
                <div class="card-body  py-3 display-5 fw-bold">{{ number_format($news->whereNotNull('deleted_at')->count()) }}</div>
                <div class="card-footer bg-light">
                    <a href="{{ route('admin.news.show') }}" class="text-decoration-none text-danger fs-2">Hidden News</a>
                </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center pb-0 bg-light">
                <div class="card-body  py-3 display-5 fw-bold">{{ number_format($users->whereNotNull('deleted_at')->count()) }}</div>
                <div class="card-footer bg-light">
                    <a href="{{ route('admin.users.show') }}" class="text-decoration-none text-danger fs-2">Deactivate Users</a>
                </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card text-center pb-0 bg-light">
                <div class="card-body  py-3 display-5 fw-bold">{{ number_format($comments->whereNotNull('user.deleted_at')->count() + $comments->whereNotNull('deleted_at')->whereNull('user.deleted_at')->count())  }}</div>
                <div class="card-footer bg-light">
                    <a href="{{ route('admin.comments.show') }}" class="text-decoration-none text-danger fs-2">Hide Comments</a>
                </div>
                </div>
            </div>
            </div>
            
            {{-- Add below if we create schedul and subscribe function  --}}

            {{-- <div class="row justify-content-center mt-4">
            <div class="col-3">
                <div class="card text-center py-4 fs-2">
                <div class="card-body py-4">100</div>
                <div class="card-footer bg-white">
                    <a href="" class="text-decoration-none text-black">Scheduled news</a>
                </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card text-center py-4 fs-2">
                <div class="card-body py-4">100</div>
                <div class="card-footer bg-white">
                    <a href="" class="text-decoration-none text-black">Subscribers</a>
                </div>
                </div>
            </div>

            <div class="col-3"></div>
            </div> --}}
@endsection
