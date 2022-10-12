$('#change-password').click(function(e) {
    e.preventDefault();
    // your code goes here...
    let current_password = $('#current-password').val();
    let new_password = $('#new-password').val();
    let new_password_confirm = $('#new-password-confirm').val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },
        url: '/changePassword',
        data: {
            current_password,
            password: new_password,
            password_confirmation: new_password_confirm
        },
        method: 'POST',
        success: function(reponse) {
            $('#update-password-success').removeClass('d-none').text(reponse.message);
            $('#new-password').val('');
            $('#new-password-confirm').val('');
        },
        error: function(response) {
            $('#update-password-danger').removeClass('d-none').text(response.responseJSON.message);
        }
    });
});