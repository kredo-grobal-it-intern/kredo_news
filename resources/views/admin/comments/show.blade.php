@extends('layouts.admin')

@section('title', 'Admin News List')
    
@section('style')
    <link href="{{ mix('css/admin/table.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="table-responsive">
    <table class="table align-middle mt-4 text-nowrap">
        <thead >
        <tr>
            <th>No.</th>
            <th class="col-1">date</th>
            <th class="col-1">Image</th>
            <th class="col-3">Title</th>
            <th class="col-4">Comment</th>
            <th class="col-1">Username</th>
            <th class="col-1">Status</th>
            <th class="col-1">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr>
                <td class="text-center">{{ $comments->firstItem() + $loop->index }}</td>
                <td>{{ date('n/j (D)', strtotime($comment->created_at)) }}</td>
                <td><img src="{{ asset('images/news/' . $comment->news->image) }}"  alt="{{ $comment->news->image }}" class="news-image"/></td>
                <td><a href="{{ route('news.show', $comment->news->id) }}" class="text-decoration-none text-black">{{ $comment->news->title }}</a></td>
                <td class="text-wrap comment-width">{{ $comment->body }}</td>
                <td>
                    @if ($comment->user->avatar)
                    <div class="row align-items-center">
                        <a href="{{ route('user.profile.show.likes', $comment->user->id) }}" class="text-decoration-none text-black">
                        <img src="{{ asset('images/avatars/'. $comment->user->avatar) }}" alt="" class="avatar">
                        {{ $comment->user->username }}
                        </a>
                    </div>
                    @else  
                        <a href="{{ route('user.profile.show.likes', $comment->user->id) }}" class="text-decoration-none text-black avatar-name-align"><span class="fs-2 me-2"><i class="fa-solid fa-circle-user"></i></span>{{ $comment->user->username }}</a>
                    @endif
                </td>
                <td>
                    @if ($comment->user->deleted_at)
                        <p class="text-danger m-0">Hidden<br><span class="small">(Deactive user)</span></p>
                    @elseif($comment->deleted_at)
                        <p class="badge bg-danger m-0">Hidden</p>
                    @else
                        <p class="badge bg-primary m-0">Display</p>
                    @endif
                </td>
                <td>        
                    @if ($comment->user->deleted_at)
                        <a href="{{ route('admin.users.restore', $comment->user->id) }}" class="btn shadow-none text-primary border-0 px-0 action-size">Activate<br><span class="small">(User)</span></a>
                    @elseif ($comment->deleted_at)
                        <a href="{{ route('admin.comments.restore', $comment->id) }}" class="btn shadow-none text-primary border-0 px-0 action-size" ><span class="me-1"><i class="fa-solid fa-eye"></i></span>Display</a>  
                    @else
                        <button class="btn shadow-none text-danger border-0 px-0 action-size" data-bs-toggle="modal" data-bs-target="#hide-comment-{{ $comment->id }}"><span class="me-1"><i class="fa-solid fa-eye-slash"></i></span>Hide</button>
                    @endif
                    @include('admin.comments.modal.status')
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
    {{ $comments->links() }}
@endsection