@if($products && $products->count())
    <div class="products-list columns-{{ $products_settings->columns }}">
        @foreach($products as $product)
            <div class="product">
                <div class="product-cover">
                    <img src="{{ $product->prod_image_url }}">
                </div>

                <div class="product-center">
                    <a class="product-title" href="/products/{{ $product->prod_alias }}">{{ $product->prod_title }}</a>
                    <div class="card-bottom"></div>
                </div>

                <div class="product-right">
                    <div class="product-price">
                        {{ $product->prod_price }} {{ $settings->currency }}
                    </div>

                    <div class="product-buttons">
                        <livewire:product-favorites :product_id="$product->prod_id"/>
                        <livewire:product-buy :product="$product"/>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="empty-result">
        <h3>Ничего не найдено</h3>
    </div>
@endif
