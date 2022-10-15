<div id="delete-account" class="modal fade" aria-modal="true" style="display: block;">
	<div class="modal-dialog modal-confirm ">
		<div class="modal-content">
			<div class="modal-header flex-column border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				<div class="icon-box">
					<i class="fa-regular fa-circle-xmark text-danger"></i>
				</div>
				<h3 class="modal-title w-100 text-center text-muted fw-bold mt-2">Are you sure?</h3>
			</div>
			<div class="modal-body text-center p-0">
				<p class="mb-0">Do you really want to delete your account?</p>
                <p>After this action is done, You will receive reactivation emails.</p>
                <div class="my-3">
                    <form action="{{ route('user.withdrawal') }}" method="post">
                        @csrf
                        <button type="button" class="btn btn-secondary me-1" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger ms-1">Delete</button>
                    </form>
                </div>
            </div>
		</div>
	</div>
</div>
