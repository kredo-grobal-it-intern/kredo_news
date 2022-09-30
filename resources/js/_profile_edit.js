$(function () {
    $('#avatar').on('change', function(e) {
        let reader = new FileReader();
        reader.onload = function(e) {
            $('#showAvatar').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});
