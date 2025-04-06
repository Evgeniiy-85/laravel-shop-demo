@extends('layouts.main')

@section('title')
    {{ $category->title }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('category', $category) }}
@endsection

@section('content')
    <h1>{{ $category->title }}</h1>

    <div class="site-catalog">
        @if($subcategories->count())
            @include('catalog.partials.subcategory_list')
        @else
            <div class="products">
                <div class="products-filter_wrap">
                    @include('products.partials.product_filter')
                </div>

                @include('products.partials.product_list')
            </div>
        @endif
    </div>
@endsection



