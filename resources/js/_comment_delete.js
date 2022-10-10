$(function() {
    const deleteButton = $('.comment-delete');
    deleteButton.on('click', function() {
        if (confirm('Are you sure to delete')) {
            let clickEle = $(this)
            let commentId = clickEle.data('commentid');

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                },
                url: '/user/comment/delete',
                type: 'POST',
                data: {
                    'comment_id': commentId,
                    '_method': 'DELETE'
                }
            })

            .done(function(res) {
                clickEle.parents('li').remove();
            })

            .fail(function() {
                alert('error');
            });
        }
    });
});