@extends('layouts.admin')

@section('title', 'Admin News List')
    
@section('style')
    <link href="{{ mix('css/admin/table.css') }}" rel="stylesheet">

@endsection

@section('content')
<div class="table-responsive">

    <table class="table align-middle mt-4 text-nowrap">
        <thead>
            <tr>
                <th>No.</th>
                <th class="col-1">date</th>
                <th class="col-1">Image</th>
                <th class="col-3">Title</th>
                <th class="col-2">Category</th>
                <th class="col-2">Media</th>
                <th class="col-2">Country</th>
                <th class="col-1">Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_news as $news)
            <tr>
                <td class="text-center">{{ $all_news->firstItem() + $loop->index }}</td>
                <td>{{ date('n/j (D)', strtotime($news->published_at)) }}</td>
                <td><img src="{{ asset('images/news/' . $news->image) }}"  alt="{{ $news->image }}" class="news-image"/></td>
                <td><a href="{{ route('news.show', $news->id) }}" class="text-decoration-none text-black">{{ $news->title }}</a></td>
                <td>{{ $news->category->name }}</td>
                <td>
                    @if ($news->source->country->national_flag)
                        <img src="{{ asset('images/national_flags/'. $news->source->country->national_flag) }}" alt="{{ $news->source->country->name }}" class="shadow" style="width:24px;">
                    @else
                        <span class="me-1"><i class="fa-solid fa-earth-americas"></i></span>
                        
                    @endif
                    {{ $news->source->country->name }}
                </td>
                <td>
                    @if ($news->country->national_flag)
                    <img src="{{ asset('images/national_flags/'. $news->country->national_flag) }}" alt="{{ $news->country->name }}" class="shadow" style="width:24px;">
                    @else
                    <span class="me-1"><i class="fa-solid fa-earth-americas"></i></span>
                    @endif
                    {{ $news->country->name }}
                </td>
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