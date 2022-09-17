<form action="{{ route('user.comment.store', $news->id) }}" method="post">
    @csrf
    <div class="mb-3 mt-5">
        <textarea class="form-control mt-3" name="comment" id="comment" rows="5">{{ old('comment') }}</textarea>
        @error('comment')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <button type="submit" class="btn btn-outline-secondary btn-sm mt-2 float-end">Post Comment</button>
    </div>
</form>