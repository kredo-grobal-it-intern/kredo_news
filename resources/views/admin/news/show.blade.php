@extends('layouts.admin')

@section('title', 'Admin News List')
    
@section('content')
<div class="container px-5">

  <table class="table">
    <thead >
      <tr>
        <th style="width:1%;">No.</th>
        <th style="width:10%;">Image</th>
        <th style="width:30%;">Title (News link)</th>
        <th style="width:48%;">Description</th>
        <th style="width:10%;">Status</th>
        <th style="width:1%;"></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($all_news as $news)
      <tr>
        <td>{{ $all_news->firstItem() + $loop->index }}</td>
        <td><img src="{{ asset('storage/images/' . $news->image_path) }}" alt="{{ $news->image_path }}" style="height:100px; width:100px; object-fit:cover;"></td>
        <td><a href="" class="text-decoration-none text-black">{{ $news->title }}</a></td>
        <td>{{ $news->description }}</td>
        <td>Display or Hidden</td>
        <td>        
          <button class="btn btn-sm shadow-none" data-bs-toggle="dropdown">
            <i class="fa-solid fa-ellipsis"></i>
          </button>
        
        <div class="dropdown-menu">
          <a href="{{ route('admin.news.edit', $news->id) }}" class="dropdown-item">
            <i class="fa-regular fa-pen-to-square"></i>Edit
          </a>
          <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-news">
            <i class="fa-regular fa-eye-slash"></i>Hide</button>  
        </div>
        </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    @include('admin.news.modal.status')
    {{ $all_news->links() }}
  </div>

  <!-- Button trigger modal -->

  
  <!-- Modal -->

  

@endsection