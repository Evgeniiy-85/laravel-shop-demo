@extends('layouts.main')

@section('title')
    {{ !$products_count ? 'Ничего не найдено' : "Найдено товаров : $products_count" }}
@endsection

@section('content')
    <div class="site-catalog">
        <h1>{{ !$products_count ? 'Ничего не найдено' : "Найдено товаров : $products_count" }}</h1>

        <div class="products">
            <div class="products-filter_wrap">
                @include('products.partials.product_filter')
            </div>

            <div class="products-list">
                @include('products.partials.product_list')
            </div>
        </div>
    </div>
@endsection
