@extends('layouts.admin')

@section('title', 'Admin News List')

@section('style')
    <link href="{{ mix('css/admin/table.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="table-responsive">

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th class="col-1">date</th>
                <th class="col-1">Image</th>
                <th class="col-3">Title</th>
                <th class="col-1">Category</th>
                <th class="col-2">Media</th>
                <th class="col-2">Country</th>
                <th class="col-1">Cooments</th>
                <th class="col-1">Likes</th>
                <th class="col-1">Dislikes</th>
                <th class="col-1">Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_news as $news)
            <tr>
                <td>{{ $all_news->firstItem() + $loop->index }}</td>
                <td class="text-nowrap">{{ date('n/j', strtotime($news->published_at)) }}<br><span class="day-of-week">{{ date('(D)', strtotime($news->published_at)) }}</span></td>
                <td><img src="{{ asset('images/news/' . $news->image) }}"  alt="{{ $news->image }}" class="news-image"/></td>
                <td class="title"><a href="{{ route('news.show', $news->id) }}" class="text-decoration-none text-black">{{ $news->title }}</a></td>
                <td class="text-nowrap">{{ $news->category->name }}</td>
                <td>
                    <div class="country-width">
                        @if ($news->source->country->national_flag)
                            <img src="{{ asset('images/national_flags/'. $news->source->country->national_flag) }}" alt="{{ $news->source->country->name }}" class="shadow flag">
                        @else
                            <img src="{{ asset('images/national_flags/world.webp') }}" alt="Flag" class="flag">
                        @endif
                        {{ $news->source->country->name }}
                    </div>
                </td>
                <td>
                    <div class="country-width" >
                        @if ($news->country->national_flag)
                            <img src="{{ asset('images/national_flags/'. $news->country->national_flag) }}" alt="{{ $news->country->name }}" class="shadow flag">
                        @else
                            <img src="{{ asset('images/national_flags/world.webp') }}" alt="Flag" class="flag">
                        @endif
                            {{ $news->country->name }}
                    </div>
                </td>
                <td>{{ number_format($news->comments->count()) }}</td>
                <td>{{ number_format($news->getDislike()->count()) }}</td>
                <td>{{ number_format($news->getlike()->count()) }}</td>
                <td>
                    @if ($news->deleted_at)
                        <p class="badge bg-danger m-0">Hidden</p>
                    @else
                        <p class="badge bg-primary m-0">Display</p>
                    @endif
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-sm" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>

                        <div class="dropdown-menu">
                            <a href="{{ route('admin.news.edit', $news->id) }}" class="dropdown-item text-decoration-none text-black">
                                <span class="me-1"><i class="fa-regular fa-pen-to-square"></span></i>Edit
                            </a>
                            @if ($news->deleted_at)
                                <a href="{{ route('admin.news.restore', $news->id) }}" class="dropdown-item btn shadow-none text-primary border-0 px-0 ms-3"><span class="me-1"><i class="fa-solid fa-eye"></i></span>Display</a>
                            @else
                                <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-news-{{ $news->id }}"><span class="me-1"><i class="fa-solid fa-eye-slash"></i></span>Hide</button>
                            @endif
                        </div>
                    </div>
                    @include('admin.news.modal.status')
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
        {{ $all_news->links() }}

@endsection
