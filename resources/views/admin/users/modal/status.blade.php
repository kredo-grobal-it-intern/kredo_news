<div class="modal fade" id="deactivate-user-{{ $user->id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-dange">
        <div class="modal-header border-danger">
            <h5 class="modal-title text-danger">Block user</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body border-danger">
            <p class="fs-5">Are you sure to block this user?</p>

            <div class="d-flex align-items-center justify-content-center">
            @if ($user->avatar)
                <img src="{{ asset('images/avatars/' . $user->avatar) }}" alt="{{ $user->avatar }}" class="modal-avatar me-2">
                <span class="display-6">{{ $user->username }}</span>
            @else

                <i class="fa-solid fa-circle-user display-5 me-2"></i>
                <span class="display-6">{{ $user->username }}</span>
            </div>
            @endif
        </div>
        <div class="modal-footer border-0">
            <form action="{{ route('admin.users.block' , $user->id) }}" method="post">
            @csrf
            @method('PATCH')

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger deactivate">Block</button>
            </form>
        </div>
        </div>
    </div>
</div>
