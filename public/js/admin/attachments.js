$(function(){
    $(document).on("change", 'input[type="file"][data-ajax_upload]', function(){
        uploadFiles(this);
    });

    $(document).on("click", '.attach-delete', function(){
        if ($(this).closest('.input-group').find('input.current-image').length > 0) {
            $(this).closest('.input-group').find('input.current-image').val('');
        }

        delete_file(this);
    });

    function uploadFiles(input) {
        let formData = new FormData;
        let $container = $(input).closest('label').next('.attachments');
        let is_multiple = $container.data('multiple');

        for (let i=0; i < event.target.files.length; i++) {
            formData.append('attachments[]', event.target.files[i]);
        }

        formData.append('field_name',  $container.data('field_name'));
        formData.append('storage',  $container.data('storage'));
        formData.append('multiple',  is_multiple);

        $.ajax({
            url: $container.data('url'),
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            success: function(html){
                if (html) {
                    if (!is_multiple) {
                        $container.find('.attach-wrap').remove();
                    }
                    $container.append(html);
                }
            }, error: function(err){
                let errors = err.responseJSON.errors;
                let messages = [];
                for (let key in errors) {
                    let text = typeof(errors[key][1]) !== 'undefined' ? errors[key][1] : errors[key][0];
                    messages.push(text);
                }

                errorMessages(messages);
                console.error(err.responseJSON.errors);
                console.error(err);
            }
        });

        $(input).val('');
    }

    function delete_file(input) {
        let $container = $(input).closest('.attach-wrap');
        $container.remove();
    }

    $('input[type="file"]:not([data-ajax_upload])').closest('label').each(function(){
        let $input_file = $(this).find('[type="file"]'),
        $label = $(this).css({'overflow':'hidden'});
        $label.data('placeholder', $label.find('text').html());

        $input_file.on('change', function(){
            if ($(this).val()) {
                $label.find('text').html('<i class="fa fa-file-o"></i>&nbsp; ' + $(this).val().replace(/.*?([^\/|\\]+)$/, '$1'));
            } else {
                $label.find('text').html($label.data('placeholder'));
            }
        })
    });
});
