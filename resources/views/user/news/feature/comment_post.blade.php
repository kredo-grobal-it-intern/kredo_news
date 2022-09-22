<form action="{{ route('user.comment.store', $news->id) }}" method="post">
    @csrf
    <div class="mb-3 mt-5">
        <textarea class="comment-form mt-3 w-100" name="comment" id="comment" rows="5">{{ old('comment') }}</textarea>
        @error('comment')
            <small class="text-danger">{{ $message }}</small>
        @enderror
        <div class="text-end mt-2">
            <button type="submit" class="btn comment-post"><i class="fa-regular fa-plus me-1"></i>Comment</button>
        </div>
    </div>
</form>