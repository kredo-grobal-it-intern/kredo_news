$(function() {
    let follow = $('.follow-toggle');
    let followUserId;
    follow.on('click', function() {
        let $this = $(this);
        console.log($this.hasClass);
        followUserId = $this.data('userid');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url: '/user/follow',
            method: 'POST',
            data: {
                'user_id': followUserId
            },
        })
        // success
        .done(function(data) {
            if($this.hasClass('btn-outline-danger')){
                $this.removeClass('btn-outline-danger').addClass('btn-outline-primary').text('Follow');
            }
            if($this.hasClass('btn-outline-primary')){
                $this.removeClass('btn-outline-primary').addClass('btn-outline-danger').text('Unfollow');
            }
        })
    });
});
