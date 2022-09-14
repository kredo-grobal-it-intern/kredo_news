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
                url: '/thumbs_up',
                type: 'POST',
                data: {
                    'news_id': likeNewsId
                },
        })
            .done(function (data) {
                if($(dislike).hasClass('text-primary')){
                    $(dislike).removeClass('text-primary');
                }
                $this.toggleClass('text-primary');
                $this.siblings('.upCount').text(data.newsLikesCount);
                $(dislike).siblings('.downCount').text(data.newsDislikesCount);
            })
            .fail(function (data, xhr, err) {
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        return false;
    });
});

$(function () {
    var dislike = $('.down-toggle');
    var like = $('.up-toggle');
    var likeNewsId;

    dislike.on('click', function () {
        var $this = $(this);
        likeNewsId = $this.data('newsid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/thumbs_down',
                type: 'POST',
                data: {
                    'news_id': likeNewsId
                },
        })
            .done(function (data) {
                if($(like).hasClass('text-primary')){
                    $(like).removeClass('text-primary');
                }
                $this.toggleClass('text-primary');
                $this.siblings('.downCount').text(data.newsDislikesCount);
                $(like).siblings('.upCount').text(data.newsLikesCount);
            })
            .fail(function (data, xhr, err) {
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        return false;
    });
});
