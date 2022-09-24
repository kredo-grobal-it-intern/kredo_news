
    $(function() {
    $('form').submit(function(e) {
        e.preventDefault();
        var data = new FormData(this);
        data.append('content', editor.getMarkdown())
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url: '/admin/news/store',
            method: 'POST',
            dataType: 'json',
            data: data,
            contentType: false,
            processData: false,
            cache: false
        })
        // success
        .done(function(data) {
            alert('News saved');
            // todo: redirect to the homepage
        })
    })

});
