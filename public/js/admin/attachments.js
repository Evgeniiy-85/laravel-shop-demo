$(function(){
    $(document).on("change", 'input[type="file"][multiple]', function(){
        uploadFiles(this);
    });

    $(document).on("click", '.attach-delete', function(){
        delete_file(this);
    });

    function uploadFiles(input) {
        let formData = new FormData;
        let $container = $(input).closest('label').next('.attachments');

        for (let file in $(input)[0].files) {
            formData.append('attachments[]',  $(input)[0].files[file]);
        }
        formData.append('field_name',  $container.data('field_name'));
        formData.append('storage',  $container.data('storage'));

        $.ajax({
            url: '/admin/api/attachments/add',
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(html){
                if (html) {
                    $container.append(html);
                }
            }, error: function(err){
                console.error(err);
            }
        });
    }

    function delete_file(input) {
        let $container = $(input).closest('.attach-wrap');
        let file = $container.find('input[type="hidden"]').val();
        $container.remove();
    }

    if ($('.ui-sortable').length > 0 ) {
        let $sortable = $('.ui-sortable');

        $sortable.sortable({
            cursor: "move",
        });
    }

    $('input[type="file"]:not([multiple])').closest('label').each(function(){
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
