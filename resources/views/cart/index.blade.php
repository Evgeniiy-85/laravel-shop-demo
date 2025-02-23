@extends('layouts.main')

@section('title')
    Корзина
@endsection

@section('content')
    <div class="site-catalog">
        <h1>Корзина</h1>

        <div class="site-catalog">
            <div class="row">
                <div class="col-md-9">
                    @include('cart.partials.cart_modal_products')
                </div>
            </div>
        </div>
    </div>
@endsection
