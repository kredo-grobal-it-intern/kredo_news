@extends('layouts.admin')

@section('title', 'Dashboard')

@section('style')
    <link href="{{ mix('css/admin_dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
        <div class="row">
            <div class="col-6 col-lg-4 mt-4">
                <div class="card shadow">
                    <div class="card-body py-3 fw-bold d-flex align-items-center">
                        <div class="rounded-circle d-flex justify-content-center align-items-center icon">
                            <span class="text-white fs-3"><i class="fa-solid fa-users"></i></span>
                        </div>
                        <div class="ms-3">
                            <h2 class="m-0 p-0">{{ number_format($users->whereNull('deleted_at')->count()) }}</h2>
                            <p class="feature-line m-0 p-0 fw-normal">Totla new users</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-4 mt-4">
                <div class="card shadow">
                    <div class="card-body py-3 fw-bold d-flex align-items-center">
                        <div class="rounded-circle d-flex justify-content-center align-items-center icon">
                            <span class="text-white fs-3"><i class="fa-solid fa-newspaper"></i></span>
                        </div>
                        <div class="ms-3">
                            <h2 class="m-0 p-0">{{ number_format($news->whereNull('deleted_at')->count()) }}</h2>
                            <p class="feature-line m-0 p-0 fw-normal">Total published news</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-4 mt-4">
                <div class="card shadow">
                    <div class="card-body py-3 fw-bold d-flex align-items-center">
                        <div class="rounded-circle d-flex justify-content-center align-items-center icon">
                            <span class="text-white fs-3"><i class="fa-solid fa-comments"></i></span>
                        </div>
                        <div class="ms-3">
                            <h2 class="m-0 p-0">{{ number_format($news->whereNull('deleted_at')->count()) }}</h2>
                            <p class="feature-line m-0 p-0 fw-normal">Total comments</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-4 mt-4">
                <div class="card shadow">
                    <div class="card-body py-3 fw-bold d-flex align-items-center">
                        <div class="rounded-circle d-flex justify-content-center align-items-center icon">
                            <span class="text-white fs-3"><i class="fa-solid fa-thumbs-up"></i></span>
                        </div>
                        <div class="ms-3">
                            <h2 class="m-0 p-0">{{ number_format($reactions->where('status', 1)->count()) }}</h2>
                            <p class="feature-line m-0 p-0 fw-normal">Total good reactions</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-4 mt-4">
                <div class="card shadow">
                    <div class="card-body py-3 fw-bold d-flex align-items-center">
                        <div class="rounded-circle d-flex justify-content-center align-items-center icon">
                            <span class="text-white fs-3"><i class="fa-solid fa-thumbs-down"></i></span>
                        </div>
                        <div class="ms-3">
                            <h2 class="m-0 p-0">{{ number_format($reactions->where('status', 2)->count()) }}</h2>
                            <p class="feature-line m-0 p-0 fw-normal">Total bad reactions</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-4 mt-4">
                <div class="card shadow">
                    <div class="card-body py-3 fw-bold d-flex align-items-center">
                        <div class="rounded-circle d-flex justify-content-center align-items-center icon">
                            <span class="text-white fs-3"><i class="fa-solid fa-bookmark"></i></span>
                        </div>
                        <div class="ms-3">
                            <h2 class="m-0 p-0">{{ number_format($bookmarks->count()) }}</h2>
                            <p class="feature-line m-0 p-0 fw-normal">Total bookmarks</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="rounded mt-5 shadow">
                    <h1 class="h5 rounded py-2 text-center text-white">Top 5 good news <i class="fa-solid fa-thumbs-up"></i></h1>
                    <ol class="list ms-3 py-2">
                        @foreach ($good_news as $news)
                        <li class="mb-4" >
                            <div class="row">
                                <div class="col-10">
                                    <a href="{{ route('news.show', $news->id) }}" class="text-black text-decoration-none">{{ $news->title }}</a>
                                </div>
                                
                                <div class="col-2">{{ number_format($news->reactions_count)}}</div>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                    <div class="rounded mt-5 shadow">
                    <h1 class="h5 rounded py-2 text-center text-white" style=" background-color:#052962">Worst 5 bad news <i class="fa-solid fa-thumbs-down"></i></h1>
                    <ol class="list ms-3 py-2">
                        @foreach ($bad_news as $news)
                        <li class="mb-4" >
                            <div class="row">
                                <div class="col-10">
                                    <a href="{{ route('news.show', $news->id) }}" class="text-black text-decoration-none">{{ $news->title }}</a>
                                </div>
                                
                                <div class="col-2">{{ number_format($news->reactions_count)}}</div>
                            </div>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="rounded mt-5 shadow">
                        <h1 class="h5 rounded py-2 text-center text-white" style=" background-color:#052962">Top 5 bookmarked news <i class="fa-solid fa-bookmark"></i></h1>
                        <ol class="list ms-3 py-2">
                            @foreach ($bookmark_news as $news)
                            <li class="mb-4" >
                                <div class="row">
                                    <div class="col-10">
                                        <a href="{{ route('news.show', $news->id) }}" class="text-black text-decoration-none">{{ $news->title }}</a>
                                    </div>
                                    
                                    <div class="col-2">{{ number_format($news->bookmarks_count)}}</div>
                                </div>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
        </div>
@endsection
