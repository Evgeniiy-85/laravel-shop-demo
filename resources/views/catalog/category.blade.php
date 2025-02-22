@extends('layouts.main')

@section('title')
    {{ $category->cat_title }}
@endsection

@section('content')
    <h1>{{ $category->cat_title }}</h1>

    <div class="site-catalog">
        @if($sub_categories->count())
            <div class="categories-list">
                @foreach ($sub_categories as $category)
                    <a class="category" href="/catalog/{{ $category->cat_alias }}">
                        <div class="category-cover">
                            <img src="/load/categories/{{ $category->cat_image }}">
                        </div>

                        <div class="category-title">{{ $category->cat_title }}</div>
                    </a>
                @endforeach
            </div>
        @else
            <div class="products">
                <div class="products-filter_wrap">


                </div>

                <div class="products-list">
                    @if($products)
                        @foreach($products as $product)
                            <div class="product">
                                <div class="product-cover">
                                    <img src="/load/products/{{ $product->prod_image }}">
                                </div>

                                <div class="product-center">
                                    <a class="product-title" href="/products/{{ $product->prod_alias }}">{{ $product->prod_title }}</a>
                                    <div class="card-bottom">Наличие: в наличии</div>
                                </div>

                                <div class="product-right">
                                    <div class="product-price">
                                        {{ $product->prod_price }} ₽
                                    </div>

                                    <div class="product-buttons">
                                        <div class="product-favorites">
                                            <button type="button" class="button button-ui btn_a-grey" data-prod_id="{{ $product->prod_id }}" data-action_type="add"></button>
                                        </div>

                                        <div class="product-by">
                                            <button type="button" class="button button-ui btn_a-outline-primary" data-prod_id="{{ $product->prod_id }}" data-action_type="append">Купить</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else:?>
                        <div class="empty-result">
                            <h3>Ничего не найдено</h3>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection



