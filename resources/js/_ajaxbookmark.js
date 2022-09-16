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
            $this.toggleClass('text-success');
            $this.toggleClass('fa-solid');
            $this.toggleClass('fa-regular');
        })

        // fail
        .fail(function() {
            console.log('fail');
        });
    });
});
