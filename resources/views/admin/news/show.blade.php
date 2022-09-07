@extends('layouts.admin')

@section('title', 'Admin News List')
    
@section('content')
<div class="container px-5">

  <table class="table  align-middle">
    <thead >
      <tr>
        <th style="width:1%;">No.</th>
        <th style="width:5%;">Image</th>
        <th style="width:30%;">Title (News link)</th>
        <th style="width:43%;">Description</th>
        <th style="width:10%;">Status</th>
        <th style="width:9%;">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($all_news as $news)
      <tr>
        <td>{{ $all_news->firstItem() + $loop->index }}</td>
        <td><img src="{{ asset('storage/images/' . $news->image) }}"  alt="{{ $news->image }}" style="height:50px; width:50px; object-fit:cover;"/></td>
        <td><a href="" class="text-decoration-none text-black">{{ $news->title }}</a></td>
        <td>{{ $news->description }}</td>
        <td>
          @if ($news->deleted_at)
            <p class="text-danger m-0">Hidden</p>
          @else
            <p class="text-dange text-primary m-0">Display</p>
          @endif
        </td>
        <td>
          <div class="d-flex ">
            <a href="{{ route('admin.news.edit', $news->id) }}" class="text-decoration-none text-black d-flex align-items-center">
              <i class="fa-regular fa-pen-to-square"></i>Edit
            </a>
            @if ($news->deleted_at)
              <a href="{{ route('admin.news.restore', $news->id) }}" class="btn shadow-none text-primary border-0 px-0 ms-3">Display</a>
            @else
              <button class="dropdown-item text-danger ms-3" data-bs-toggle="modal" data-bs-target="#hide-news-{{ $news->id }}">Hide</button>    

            @endif
          </div>        
          @include('admin.news.modal.status')
        </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    {{ $all_news->links() }}
  </div>
@endsection