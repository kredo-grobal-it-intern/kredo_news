$(function() {
    
    $('form').submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize()+ '&content=' + $('#editor').html();
        // data.append('content', $('#editor').html());
        
        console.log(editor);
        // $.ajax({
        //     headers: {
        //         'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        //     },
        //     url: '/admin/news/store',
        //     method: 'POST',
        //     data: {
        //         'news_id': likeNewsId
        //     },
        // })
        // // success
        // .done(function(data) {
            
        // })
    })

});
