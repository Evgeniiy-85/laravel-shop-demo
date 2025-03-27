import Search from './search.js';
import route from './route.js';

$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let search = new Search();
    search.init();

    $('.image-thumb').click(function() {
        let $container = $(this).closest('.product-images-slider');
        $container.find('.image-thumb').removeClass('active');
        $(this).addClass('active');
        let image_src = $(this).data('img_src');
        $container.find('.images-main img').attr('src', image_src);
    });
});
