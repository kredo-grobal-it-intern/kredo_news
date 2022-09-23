$(function() {
    const unfollow = $('#unfollow');
    const follow = $('#follow');
    let userId;

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    follow.on('click', function() {
        let $this = $(this);
        userId = $this.data('userid');

        $.ajax({
            url: '/user/follow',
            method: 'POST',
            data: {
                'user_id': userId
            },
        })
        // success
        .done(function(data) {
            $this.addClass('d-none');
            unfollow.removeClass('d-none');
        })
    });

    unfollow.on('click', function() {
        let $this = $(this);
        userId = $this.data('userid');

        $.ajax({
            url: '/user/unfollow',
            method: 'POST',
            data: {
                'user_id': userId
            },
        })
        // success
        .done(function(data) {
            $this.addClass('d-none');
            follow.removeClass('d-none');
        })
    });
});
