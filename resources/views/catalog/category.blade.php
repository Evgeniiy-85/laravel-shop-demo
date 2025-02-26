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
                    @include('catalog.partials.product_filter')
                </div>

                <div class="products-list">
                    @if($products->count())
                        @include('catalog.partials.product_list')
                    @else
                        <div class="empty-result">
                            <h3>Ничего не найдено</h3>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection



