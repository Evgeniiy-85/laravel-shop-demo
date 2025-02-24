
<div class="cart">
    @if($cart->products)
        <div class="cart-header">
            <div class="cart-title">Список товаров</div>
        </div>

        <div class="cart-body cart-products" data-count_products="{{ $cart->count_products }}">
            @foreach($cart->products as $prod_id => $product)
                @php
                    $quantity = $cart->quantity[$prod_id]
                @endphp

                <div class="cart-product" data-prod_id="{{ $product->prod_id }}">
                    <div class="cart-product-cover">
                        <img src="{{ $product->prod_image_url }}">
                    </div>

                    <div class="cart-product_info">
                        <div class="cart-product_title">{{ $product->prod_title }}</div>
                        <div class="cart-product_price">{{ $product->prod_price * $quantity}} ₽</div>
                    </div>
                </div><hr>
            @endforeach
        </div>

        <div class="cart-footer">
            <div class="cart-footer_left">
                <span>Итого: </span>
                <span class="cart-sum">{{ $cart->total }} ₽</span>
            </div>
        </div>
    @else
        <div class="empty-result"><h3>Корзина пуста</h3></div>
    @endif
</div>

