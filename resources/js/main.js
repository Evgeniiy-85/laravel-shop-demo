import Cart from './cart.js';
import Favorites from './favorites.js';
import route from './route.js';

$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let cart = new Cart();
    cart.init();

    let favorites = new Favorites();
    favorites.init();

    $('.image-thumb').click(function() {
        let $container = $(this).closest('.product-images-slider');
        $container.find('.image-thumb').removeClass('active');
        $(this).addClass('active');
        let image_src = $(this).data('img_src');
        $container.find('.images-main img').attr('src', image_src);
    });
});