<div class="cart">
    <div class="cart-header">
        <div class="cart-title">Список товаров</div>
    </div>

    <div class="cart-body cart-products">
        @foreach($order_items as $order_item)
            @php
                $product = \App\Models\Product\Product::find($order_item->id) ?? new \App\Models\Product\Product();
            @endphp
            <div class="cart-product">
                <div class="cart-product-cover">
                    <img src="{{ $product->image_url }}">
                </div>

                <div class="cart-product_info">
                    <div class="cart-product_title">{{ $order_item->title }}</div>
                    <div
                        class="cart-product_price">{{ $order_item->price * $order_item->quantity}} {{ Setting::get('currency') }}</div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>

    <div class="cart-footer">
        <div class="cart-footer_left">
            <span>Итого: </span>
            <span class="cart-sum">{{ $order->order_sum }} {{ Setting::get('currency') }}</span>
        </div>
    </div>
</div>
