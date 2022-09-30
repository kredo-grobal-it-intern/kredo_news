$(function() {
    const unfollow = $('.unfollow');
    const follow = $('.follow');
    const authFollowerCount = $('.auth-follower-count');
    const authFollowingCount = $('.auth-following-count');
    const userFollowerCount = $('.user-follower-count');
    const userFollowingCount = $('.user-following-count');
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
            $this.siblings('.unfollow').removeClass('d-none');
            // When you follow in followers and followings modal in your own profile page
            authFollowerCount.text(data.authFollowerCount);
            authFollowingCount.text(data.authFollowingCount);
            // When you follow in other's profile page
            userFollowerCount.text(data.userFollowerCount);
            userFollowingCount.text(data.userFollowingCount);
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
            $this.siblings('.follow').removeClass('d-none');
            // When you follow in followers and followings modal in your own profile page
            authFollowerCount.text(data.authFollowerCount);
            authFollowingCount.text(data.authFollowingCount);
            // When you unfollow in other's profile page
            userFollowerCount.text(data.userFollowerCount);
            userFollowingCount.text(data.userFollowingCount);
        })
    });
});
