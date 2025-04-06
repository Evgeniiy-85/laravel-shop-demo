@extends('layouts.main')

@section('title')
    {{ $product->title }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('product', $product, $category) }}
@endsection

@section('content')
    <div class="site-product">
        <h1>{{ $product->title }}</h1>

        <div class="product-card">
            <div class="product-images-slider">
                @if($images = $product->images_data)
                    <div class="images-thumbs">
                        @foreach($images as $key => $image)
                            <div data-img_src="{{ $product->getImageUrl($image) }}" class="image-thumb{{ $key == 0 ? ' active' : '' }}">
                                <img src="{{ $product->getImageUrl($image) }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                <div class="images-main">
                    <img src="{{ $product->image_url }}">
                </div>
            </div>

            <div class="product-center">
                <div class="short_desc">{{ $product->short_desc }} <a class="ui-link" href="#product_desc">Подробнее</a></div>

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
                        {{ $product->price }} {{ Setting::get('currency') }}
                    </div>

                    <div class="product-buttons">
                        <livewire:product-favorites :product_id="$product->id"/>
                        <livewire:product-buy :product="$product"/>
                    </div>
                </div>

                <div class="product-bottom"></div>
            </div>
        </div>

        <div class="product-card product-desc" id="product_desc">
            <div class="product-desc-header">Описание</div>

            <div class="product-desc-text">
                {{ $product->desc }}
            </div>
        </div>

        <div class="products-reviews_wrap" id="product_reviews">
            {{ Widget::ProductReviews(['id' => $product->id, 'alias' => $product->alias]) }}
        </div>
    </div>
@endsection
