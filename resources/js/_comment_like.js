$(function() {
    let commentLike = $('#comment-like');
    let commentId;

    commentLike.on('click', function() {
        let $this = $(this);
        commentId = $this.data('commentid');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url: '/user/comment/like',
            method: 'POST',
            data: {
                'comment_id': commentId
            },
        })

        .done(function(data) {
            $this.toggleClass('comment-liked').toggleClass('fa-solid').toggleClass('fa-regular');
        });
    });
});