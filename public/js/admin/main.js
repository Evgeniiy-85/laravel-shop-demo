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
