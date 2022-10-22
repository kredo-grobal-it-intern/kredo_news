$(function () {
    var like = $('.up-toggle');
    var dislike = $('.down-toggle');
    var likeNewsId;

    like.on('click', function () {
        var $this = $(this);
        likeNewsId = $this.data('newsid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/user/like',
                type: 'POST',
                data: {
                    'news_id': likeNewsId
                },
        })
            .done(function (data) {
                let thumbsUpEl = $(`[data-newsid='${likeNewsId}'].up-toggle`);
                thumbsUpEl.toggleClass('text-primary');
                thumbsUpEl.siblings('.upCount').text(data.newsLikesCount);
                thumbsUpEl.closest('.status').find('.downCount').text(data.newsDislikesCount).siblings('.down-toggle').removeClass('text-danger');
            })
            .fail(function (data, xhr, err) {
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        return false;
    });

    dislike.on('click', function () {
        var $this = $(this);
        likeNewsId = $this.data('newsid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/user/dislike',
                type: 'POST',
                data: {
                    'news_id': likeNewsId
                },
        })
            .done(function (data) {
                let thumbsDownEl = $(`[data-newsid='${likeNewsId}'].down-toggle`);
                thumbsDownEl.toggleClass('text-danger');
                thumbsDownEl.siblings('.downCount').text(data.newsDislikesCount);
                thumbsDownEl.closest('.status').find('.upCount').text(data.newsLikesCount).siblings('.up-toggle').removeClass('text-primary');
            })
            .fail(function (data, xhr, err) {
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        return false;
    });
});
