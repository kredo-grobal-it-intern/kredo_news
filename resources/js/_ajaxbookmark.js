$(function() {
    let like = $('.bookmark-toggle');
    let likeNewsId;
    like.on('click', function() {
        let $this = $(this);
        likeNewsId = $this.data('newsid');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url: '/user/bookmark',
            method: 'POST',
            data: {
                'news_id': likeNewsId
            },
        })
        // success
        .done(function(data) {
            let bookmarkEl = $(`[data-newsid='${likeNewsId}'].bookmark-toggle`);
            bookmarkEl.toggleClass('text-success');
            bookmarkEl.toggleClass('fa-solid');
            bookmarkEl.toggleClass('fa-regular');
        })
    });
});
