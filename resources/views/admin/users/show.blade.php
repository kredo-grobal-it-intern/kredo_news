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
                <th class="col-2">User</th>
                <th class="col-2">E-mail</th>
                <th class="col-2">Nationality</th>
                <th class="col-2">Country</th>
                <th class="col-1">Comments</th>
                <th class="col-1">Follower</th>
                <th class="col-1">Followings</th>
                <th class="col-1">Status</th>
                <th class="col-1">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
            <td class="text-center">{{ $users->firstItem() + $loop->index }}</td>
            <td>
                @if ($user->avatar)
                <div class="row align-items-center">
                    <a href="{{ route('user.profile.show.likes', $user->id) }}" class="text-decoration-none text-black">
                    <img src="{{ asset('images/avatars/' . $user->avatar) }}" alt="" class="avatar">
                    {{ $user->username }}
                    </a>
                </div>
                @else  
                    <a href="{{ route('user.profile.show.likes', $user->id) }}" class="text-decoration-none text-black avatar-name-align"><span class="fs-2 me-2"><i class="fa-solid fa-circle-user"></i></span>{{ $user->username }}</a>
                @endif

            </td>
            <td>{{ $user->email }}</td>
            <td>
                @if ($user->country->national_flag)
                    <img src="{{ asset('images/national_flags/'. $user->country->national_flag) }}" alt="{{ $user->country->name }}" class="shadow flag" >
                @else
                    <img src="{{ asset('images/national_flags/world.png') }}" alt="Flag" class="flag">                   
                @endif
                {{ $user->country->name }}
            </td>
            <td>
                @if ($user->country->national_flag)
                    <img src="{{ asset('images/national_flags/'. $user->country->national_flag) }}" alt="{{ $user->country->name }}" class="shadow flag" >
                @else
                    <img src="{{ asset('images/national_flags/world.png') }}" alt="Flag" class="flag">                   
                @endif
                {{ $user->nationality->name }}
            </td>
            <td>{{ $user->comments->count() }}</td>
            <td>{{ $user->followers->count() }}</td>
            <td>{{ $user->followings->count() }}</td>
            <td>
                @if ($user->deleted_at)
                    <p class="badge bg-danger m-0">Inactive</p>
                @else
                <p class="badge bg-primary m-0">Active</p>
                @endif
            </td>
            <td>
                @if ($user->deleted_at)
                <a href="{{ route('admin.users.restore', $user->id) }}" class="btn shadow-none text-primary border-0 px-0 action-size"><span class="me-1"><i class="fa-solid fa-user"></i>Activate</a>
                @else
                <button class="btn shadow-none text-danger border-0 px-0 action-size" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{ $user->id }}"><span class="me-1"><i class="fa-solid fa-user-slash"></i>Deactivate</span></button>
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