import route from './route.js';

export default class Cart {
    static URL_ACTIONS = route('api.cart.actions');

    constructor() {}

    init() {
        this.updElements();
        this.Events();
    }

    Events() {
        let cart = this;
        $(document).on('click', '.cart [data-action_type], .product-by [data-action_type]', function() {
            let action_type = $(this).data('action_type');
            if (action_type == 'show') {
                $('#cart_modal').addClass('show');
                return false;
            }

            let prod_id = typeof($(this).data('prod_id')) !== 'undefined' ? $(this).data('prod_id') : null;
            cart.runAction($(this).data(), (html) => {
                cart.updCart(html, action_type);
                cart.updProdButtons(prod_id);
            });
        });

        $(".btn-cart, #cart_modal").hover(function(){}, function(){
            $('#cart_modal').removeClass('show');
        });
        $("body").click(function(){
            $('#cart_modal').removeClass('show');
        });
    }

    updCart(html, action_type) {
        let cart_title = '<span>Корзина</span>';
        let count_products = '';
        let $cart = $('.site-cart .cart').length > 0 ? $('.site-cart .cart') : $('#cart_modal .cart');

        if (html) {
            let price = $(html).find('.cart-sum').text();
            cart_title = `<span class="cart-sum">${price}</span>`;
            count_products = $(html).find('.cart-products').data('count_products');

            if ($('.site-cart .cart').length > 0) {
                $('#cart_modal').removeClass('has-products').find('.modal-body').html('');
                $('.btn-cart .count-products-icon').html(count_products).removeClass('hidden');
            } else {
                $('#cart_modal').addClass('has-products').find('.modal-body').html(html);
                $('.btn-cart .count-products-icon').html(count_products).removeClass('hidden');
            }
        }

        if (!html) {
            $('#cart_modal').removeClass('has-products').find('.modal-body').html(html);
            $('.btn-cart .count-products-icon').html(count_products).addClass('hidden');
        }

        if (action_type !== 'get' && $('.site-cart').find('.cart').length > 0) {
            if (html) {
                $('.site-cart').find('.cart').replaceWith(html);
            } else {
                $('.site-cart').find('.cart').html('<div class="empty-result"><h3>Корзина пуста</h3></div>');
            }
        }

        $('.btn-cart .btn-title').html(cart_title);
    }

    updProdButton($el, has_product) {
        if ($el.parent('.product-by').length > 0) {
            if (has_product) {
                $el.html('В корзине');
                $el.addClass('active');
                $el.data('action_type', 'show');
            } else {
                $el.html('Купить');
                $el.removeClass('active');
                $el.data('action_type', 'append');
            }
        }
    }

    updProdButtons(prod_id) {
        let buttons = prod_id ? $(`.product-by button[data-prod_id="${prod_id}"]`) : $('.product-by button');
        if (buttons.length > 0) {
            let cart = this;
            buttons.each(function() {
                prod_id = $(this).data('prod_id');
                let prod_exists = $(`#cart_modal .cart-product[data-prod_id="${prod_id}"]`).length;
                cart.updProdButton($(this), prod_exists);
            });
        }
    }

    updElements() {
        let cart = this;
        this.runAction({action_type:'get'}, (html) => {
            cart.updCart(html, 'get');
            cart.updProdButtons();
        });
    }

    runAction(data, callback) {
        $.ajax({
            url: Cart.URL_ACTIONS,
            type: 'post',
            dataType: 'html',
            data: data,
            success: function (html) {
                callback(html);
            }, error: function () {
                alert('Произошла ошибка при обновлении корзины');
            }
        });
    }
}
