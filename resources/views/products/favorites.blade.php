@extends('layouts.main')

@section('title')
    Избранное
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('favorites') }}
@endsection

@section('content')
    <div class="site-catalog">
        <h1>Избранное</h1>

        <div class="products">
            @include('products.partials.product_list')
        </div>
    </div>
@endsection
