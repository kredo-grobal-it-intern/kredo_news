<div class="container container-width mt-4">
    <form action="{{ route('admin.mail') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="subject" class="form-label mt-5 fs-4 d-block">■Newsletter Subject</label>
        <input class="form-control" name="subject">

        <label for="content" class="form-label mt-5 fs-4 d-block">■Newsletter Content</label>
        <textarea id="myeditorinstance" name="content"></textarea>

        <button type="submit" class="btn btn-primary w-50 mt-4 mb-5 mx-auto d-block">Send</button>
    </form>
</div>
