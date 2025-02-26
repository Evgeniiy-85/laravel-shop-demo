@extends('layouts.main')

@section('title')
    {{ $category->cat_title }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('category', $category) }}
@endsection

@section('content')
    <h1>{{ $category->cat_title }}</h1>

    <div class="site-catalog">
        @if($subcategories->count())
            @include('catalog.partials.subcategory_list')
        @else
            <div class="products">
                <div class="products-filter_wrap">
                    @include('products.partials.product_filter')
                </div>

                <div class="products-list">
                    @include('products.partials.product_list')
                </div>
            </div>
        @endif
    </div>
@endsection



