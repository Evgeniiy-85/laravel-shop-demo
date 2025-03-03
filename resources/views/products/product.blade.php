@extends('layouts.main')

@section('title')
    {{ $product->prod_title }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('product', $product, $category) }}
@endsection

@section('content')
    <div class="site-product">
        <h1>{{ $product->prod_title }}</h1>

        <div class="product-card">
            <div class="product-images-slider">
                @if($images = $product->prod_images_data)
                    <div class="images-thumbs">
                        @foreach($images as $key => $prod_image)
                            <div data-img_src="{{ $product->getImageUrl($prod_image) }}" class="image-thumb{{ $key == 0 ? ' active' : '' }}">
                                <img src="{{ $product->getImageUrl($prod_image) }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="images-main">
                    <img src="{{ $product->prod_image_url }}">
                </div>
            </div>

            <div class="product-center">
                <div class="short_desc">{{ $product->prod_short_desc }} <a class="ui-link" href="#product_desc">Подробнее</a></div>

                <div class="product-stat">
                    <a class="product-rating" href="#product_reviews">

                        @if($count_reviews)
                            {{ Widget::Rating(['rating' => $product_rating]) }}&nbsp;
                            {{ "{$count_reviews} ".App\Helpers\Helper::addTermination($count_reviews, 'отзыв[TRMNT]') }}
                        @else
                            <div class="rating-item">
                                <img class="sale" src="/images/icons/rating-star-empty.svg">&nbsp;нет отзывов
                            </div>
                        @endif
                    </a>
                </div>

                <div class="product-buttons-one_line">
                    <div class="product-price">
                        {{ $product->prod_price }} ₽
                    </div>

                    <div class="product-buttons">
                        <div class="product-favorites">
                            <button type="button" class="button button-ui btn_a-grey" data-prod_id="{{ $product->prod_id }}" data-action_type="add"></button>
                        </div>

                        <div class="product-by">
                            <a class="button button-ui btn_a-outline-primary" href="/buy/{{ $product->prod_alias }}">Купить</a>
                        </div>
                    </div>
                </div>

                <div class="product-bottom">Наличите: в наличии</div>
            </div>
        </div>

        <div class="product-card product-desc" id="product_desc">
            <div class="product-desc-header">Описание</div>

            <div class="product-desc-text">
                {{ $product->prod_desc }}
            </div>
        </div>

        <div class="products-reviews_wrap" id="product_reviews">
            {{ Widget::ProductReviews(['prod_id' => $product->prod_id, 'prod_alias' => $product->prod_alias]) }}
        </div>
    </div>
@endsection
