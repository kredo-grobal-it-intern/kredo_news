<div class="modal fade" id="deactivate-user-{{ $user->id }}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-danger">
        <h5 class="modal-title text-danger">Deactivate user</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-danger">
        <p>Are you sure to deactivate this user?</p>
        <div>
          @if ($user->avatar)
            <img src="{{ asset('storage/avatar/' . $user->avatar) }}" alt="{{ $user->avatar }}">
          @else  
          <div class="d-flex align-items-center justify-content-center">

            <i class="fa-solid fa-circle-user display-5 me-2"></i>
            <span class="display-6">{{ $user->username }}</span>
          </div>
          @endif
        </div>
      </div>
      <div class="modal-footer border-0">
        <form action="{{ route('admin.users.destroy' , $user->id) }}" method="post">
          @csrf
          @method('DELETE')
          
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Deactivate</button>
        </form>
      </div>
    </div>
  </div>
</div>
