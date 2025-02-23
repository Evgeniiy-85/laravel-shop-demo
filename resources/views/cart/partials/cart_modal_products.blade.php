<div class="selected-products">
    @if($cart->products)
        <div class="block-header">
            <div class="block-title">Список товаров</div>
        </div>

        <div class="block-body">
            @foreach($cart->products as $prod_id => $product)
                @php
                    $quantity = $cart->quantity[$prod_id]
                @endphp
                <div class="product">
                    <div class="product-cover">
                        <img src="{{ $product->prod_image_url }}">
                    </div>

                    <div class="product-info">
                        <div class="product-title">
                            {{ $product->prod_title }} <b>({{ $quantity }}шт.)</b>
                        </div>
                        <div class="product-price"><nobr>{{ $product->prod_price * $quantity }} ₽</nobr></div>
                    </div>
                </div><hr>
            @endforeach
        </div>

         <div class="block-footer">
            <div class="block-footer_left">
                <strong>Итого: </strong>
                <span>{{ $cart->total }}</span>
            </div>

             <div>
                 <a href="{{ route('cart.checkout') }}" class="button button-ui btn_a-primary button-small">Перейти к оформлению</a>
             </div>
         </div>
    @else:?>
        <div class="empty-result">
            <h3>Корзина пуста</h3>
        </div>
    @endif
</div>
