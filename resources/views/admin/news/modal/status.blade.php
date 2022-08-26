<!-- Modal -->
<div class="modal fade" id="deactivate-news">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-danger">
        <h5 class="modal-title text-danger">Hide news</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body border-danger">
        <p>Are you sure to hide this news?</p>
        <h1 class="fs-5 text-center">{{ $news->title }}</h1>
        <img src="{{ asset('storage/images/' . $news->image_path) }}" alt="{{ $news->image_path }}" class="w-50 h-50 d-block mx-auto">
      </div>
      <div class="modal-footer  border-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Hide</button>
      </div>
    </div>
  </div>
</div>
