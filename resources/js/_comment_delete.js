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
                url: '/user/comment/' + commentId,
                type: 'POST',
                data: {
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