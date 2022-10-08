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
                <td class="text-nowrap">{{ date('n/j', strtotime($news->post_date)) }}<br><span class="day-of-week">{{ date('(D)', strtotime($news->post_date)) }}</span></td>
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
                        <p class="badge bg-danger">Deleted</p>
                    @elseif ($news->status == 2)
                        <p class="badge bg-secondary">Draft</p>
                    @else
                        <p class="badge bg-primary">Display</p>
                    @endif
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-sm" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis"></i>
                        </button>

                        <div class="dropdown-menu">
                            @if ($news->deleted_at)
                            <form action="{{ route('admin.news.display', $news->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <input type="hidden" name="status" value="1">
                                <button type="submit" class="dropdown-item text-primary"><i class="fa-solid fa-eye"></i>Display</button>
                            </form>

                            <form action="{{ route('admin.news.draft', $news->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <input type="hidden" name="status" value="draft">
                                <button type="submit" class="dropdown-item"><i class="fa-solid fa-file-excel"></i>Draft</button>
                            </form>
                            
                            
                            @elseif($news->status == 2)
                            <form action="{{ route('admin.news.display', $news->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                
                                <input type="hidden" name="status" value="1">
                                <button type="submit" class="dropdown-item text-primary"><i class="fa-solid fa-eye"></i>Display</button>
                            </form>
                            
                            <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-news-{{ $news->id }}"><i class="fa-solid fa-trash-can"></i>Delete</button>
                            
                            @else
                            <form action="{{ route('admin.news.draft', $news->id) }}" method="post">
                                @csrf
                                @method('PATCH')

                                <input type="hidden" name="status" value="2">
                                <button type="submit" class="dropdown-item"><i class="fa-solid fa-file-excel"></i>Draft</button>
                            </form>

                            <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#hide-news-{{ $news->id }}"><i class="fa-solid fa-trash-can"></i>Delete</button>

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
