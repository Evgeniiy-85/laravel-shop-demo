@extends('layouts.main')

@section('title')
    {{ $subcategory->title }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('category', $subcategory) }}
@endsection

@section('content')
    <div class="site-catalog">
        <h1>{{ $subcategory->title }}</h1>

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



