<div class="cart">
    <div class="cart-header">
        <div class="cart-title">Список товаров</div>
    </div>

    <div class="cart-body cart-products">
        @foreach($order_items as $order_item)
            @php
                $product = App\Models\Product::find($order_item->prod_id) ?? new App\Models\Product();
            @endphp
            <div class="cart-product">
                <div class="cart-product-cover">
                    <img src="{{ $product->prod_image_url }}">
                </div>

                <div class="cart-product_info">
                    <div class="cart-product_title">{{ $order_item->prod_title }}</div>
                    <div class="cart-product_price">{{ $order_item->prod_price * $order_item->quantity}} {{ $settings->currency }}</div>
                </div>
            </div><hr>
        @endforeach
    </div>

    <div class="cart-footer">
        <div class="cart-footer_left">
            <span>Итого: </span>
            <span class="cart-sum">{{ $order->order_sum }} {{ $settings->currency }}</span>
        </div>
    </div>
</div>
