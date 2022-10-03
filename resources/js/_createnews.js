
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
                // $('#editor-error').removeClass('d-none');
                // var err = eval("(" + xhr.responseText + ")");

                console.log(xhr)
                let errorMessages = '<ul>';
                for(error in xhr.responseJson.errors) {
                    errorMessages += "<li>" + error + "</li>";
                }
                errorMessages += "</ul>";
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: xhr.responseJSON.message,
                    
                    footer:errorMessages
                })
            }

            // error: function(xhr, status, error) {
            //     var err = eval("(" + xhr.responseText + ")");
            //     alert(err.Message);
            //   }
        })
        // success


        .done(function(data) {
            window.location.href = "/admin/dashboard";

        })
    })

});
