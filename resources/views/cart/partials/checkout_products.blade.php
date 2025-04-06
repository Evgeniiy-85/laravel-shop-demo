<div class="cart">
    @if($cart->products)
        <div class="cart-header">
            <div class="cart-title">Список товаров</div>
        </div>

        <div class="cart-body cart-products" data-count_products="{{ $cart->count_products }}">
            @foreach($cart->products as $id => $product)
                @php
                    $quantity = $cart->quantity[$id]
                @endphp

                <div class="cart-product" data-id="{{ $product->id }}">
                    <div class="cart-product-cover">
                        <img src="{{ $product->image_url }}">
                    </div>

                    <div class="cart-product_info">
                        <div class="cart-product_title">{{ $product->title }}</div>
                        <div class="cart-product_price">{{ $product->price * $quantity}} {{ Setting::get('currency') }}</div>
                    </div>
                </div><hr>
            @endforeach
        </div>

        <div class="cart-footer">
            <div class="cart-footer_left">
                <span>Итого: </span>
                <span class="cart-sum">{{ $cart->total }} {{ Setting::get('currency') }}</span>
            </div>
        </div>
    @else
        <div class="empty-result"><h3>Корзина пуста</h3></div>
    @endif
</div>

