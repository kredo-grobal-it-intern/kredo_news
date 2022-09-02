@extends('layouts.admin')

@section('title', 'Admin News List')
    
@section('content')
<div class="container px-5">
  <table class="table align-middle">
    <thead >
      <tr>
        <th style="width:1%;">No.</th>
        <th style="width:5%;">Image</th>
        <th style="width:30%;">Title (News link)</th>
        <th style="width:25%;">Comment</th>
        <th style="width:20%;">Username</th>
        <th style="width:10%;">Status</th>
        <th style="width:9%;">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($comments as $comment)
      <tr>
        <td>{{ $comments->firstItem() + $loop->index }}</td>
        <td><img src="{{ asset('storage/images/' . $comment->news->image) }}"  alt="{{ $comment->news->image }}" style="height:50px; width:50px; object-fit:cover;"/></td>
        <td><a href="" class="text-decoration-none text-black">{{ $comment->news->title }}</a></td>
        <td>{{ $comment->body }}</td>
        <td>
          @if ($comment->user->avatar)
          <div class="row align-items-center">
            <a href="" class="text-decoration-none text-black">
              <img src="" alt="" style="object-fit:cover;">
            </a>
          </div>
          @else  
              <a href="" class="text-decoration-none text-black" style="display: flex; align-items: center;"><i class="fa-solid fa-circle-user fs-2 me-2"></i><span class="" style="">{{ $comment->user->username }}</span></a>
          @endif
        </td>
        <td>
          @if ($comment->deleted_at)
            @if ($comment->user->deleted_at)
              <p class="text-danger m-0">Hidden<br><span class="small">(Deactive user)</span></p>
            @else
              <p class="text-danger m-0">Hidden</p>
            @endif
          @else
            <p class="text-dange text-primary m-0">Display</p>
          @endif
        </td>
        <td>        
          @if ($comment->deleted_at)
            <a href="{{ route('admin.comments.restore', $comment->id) }}" class="btn shadow-none text-primary border-0 px-0">Display</a>  
          @else
            <button class="btn shadow-none text-danger border-0 px-0" data-bs-toggle="modal" data-bs-target="#hide-comment-{{ $comment->id }}">Hide</button>
          @endif
          @include('admin.comments.modal.status')
        </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    {{ $comments->links() }}
  </div>
@endsection