@extends('layouts.main')

@section('title')
    {{ $product->prod_title }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('product', $product, $category) }}
@endsection

@section('content')
    <div class="site-catalog">
        <h1>{{ $product->prod_title }}</h1>

        <div class="product-card">
            <div class="product-images-slider">
                <div class="images-thumbs">
                    @if($product->prod_images)
                        @foreach($product->getImages() as $key => $prod_image)
                            <div data-img_src="{{ $product->getImageUrl($prod_image) }}" class="image-thumb{{ $key == 0 ? ' active' : '' }}">
                                <img src="{{ $product->getImageUrl($prod_image) }}">
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="images-main">
                    <img src="{{ $product->prod_image_url }}">
                </div>
            </div>

            <div class="product-center">
                <div class="product-title">{{ $product->prod_title }}</div>

                <div class="product-stat">
                    <a class="product-rating" href="#product_reviews">
                        @if(1)

                        @else

                        @endif
                    </a>
                </div>

                <div class="product-by product-by-one_line">
                    <div class="product-price">
                        {{ $product->prod_price }} ₽
                    </div>

                    <div class="product-buttons">
                        <div class="product-favorites">

                        </div>

                        <a class="button button-ui btn_a-outline-primary" href="/buy/{{ $product->prod_alias }}">Купить</a>
                    </div>
                </div>
                <div class="product-bottom">Наличите: в наличии</div>
            </div>
        </div>
    </div>
@endsection
