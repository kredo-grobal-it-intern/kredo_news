@extends('layouts.admin')

@section('title', 'Admin News List')
    
@section('content')
<div class="container px-5">

    <table class="table align-middle">
        <thead >
        <tr>
            <th style="width:1%;">No.</th>
            <th style="width:30%;">User</th>
            <th style="width:30%;">E-mail</th>
            <th style="width:20%;">Nationality</th>
            <th style="width:10%;">Status</th>
            <th style="width:9%;">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
            <td>{{ $users->firstItem() + $loop->index }}</td>
            <td>
                @if ($user->avatar)
                <div class="row align-items-center">
                    <a href="" class="text-decoration-none text-black">
                    <img src="" alt="" style="object-fit:cover;">
                    {{ $user->username }}
                    </a>
                </div>
                @else  
                    <a href="" class="text-decoration-none text-black" style="display: flex; align-items: center;"><i class="fa-solid fa-circle-user fs-2 me-2"></i><span class="" style="">{{ $user->username }}</span></a>
                @endif

            </td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->nationality->name }}</td>
            <td>
                @if ($user->deleted_at)
                    <p class="text-danger m-0">Inactive</p>
                @else
                <p class="text-dange text-primary m-0">Active</p>
                @endif
            </td>
            <td>
                @if ($user->deleted_at)
                <a href="{{ route('admin.users.restore', $user->id) }}" class="btn shadow-none text-primary border-0 px-0">Activate</a>
                @else
                <button class="btn shadow-none text-danger border-0 px-0" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{ $user->id }}">Deactivate</button>
                @endif
                @include('admin.users.modal.status')
            </td>
            </tr>
            @endforeach
            
        </tbody>
        </table>
        {{ $users->links() }}
    </div>

    @endsection


    {{-- Extra function --}}

    {{-- @section('script')
    <script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {
        $('.deactivate').click(function() {
        var token = $("meta[name='csrf-token']").attr("content");
        // todo: make the user id dynamic
        $.ajax({
            'url': '/admin/users/6',
            'method': 'delete',
            'data': {
            _token: token
            },
            success: function(response) {
            console.log(response)
            }
        })
        });
    })
</script>
@endsection --}}