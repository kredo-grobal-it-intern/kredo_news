
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
            cache: false,

            error:function(xhr, status, error) {

                // console.log(xhr)
                let errorMessages = "<ul class='test'>";
                for(error in xhr.responseJSON.errors) {
                    errorMessages += "<li class='text-danger'>" + error + " is required</li>";
                }
                errorMessages += "</ul>";
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    // text: xhr.responseJSON.message,
                    // footer:errorMessages,
                    html:errorMessages,
                    
                })
            }
        })
        // success

        


        .done(function(data) {
            window.location.href = "/admin/dashboard";

        })
    })

});
