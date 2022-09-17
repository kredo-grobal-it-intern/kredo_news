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
                url: '/user/thumbs_up',
                type: 'POST',
                data: {
                    'news_id': likeNewsId
                },
        })
            .done(function (data) {
                $this.toggleClass('text-primary');
                $this.siblings('.upCount').text(parseInt(data.newsLikesCount) > 0 ? data.newsLikesCount : '');
                $this.closest('.row').find('.downCount').text(parseInt(data.newsDislikesCount) > 0 ? data.newsDislikesCount : '').siblings('.down-toggle').removeClass('text-primary');
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
                url: '/user/thumbs_down',
                type: 'POST',
                data: {
                    'news_id': likeNewsId
                },
        })
            .done(function (data) {
                $this.toggleClass('text-primary');
                $this.siblings('.downCount').text(parseInt(data.newsDislikesCount) > 0 ? data.newsDislikesCount : '');
                $this.closest('.row').find('.upCount').text(parseInt(data.newsLikesCount) > 0 ? data.newsLikesCount : '').siblings('.up-toggle').removeClass('text-primary');
            })
            .fail(function (data, xhr, err) {
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        return false;
    });
});
