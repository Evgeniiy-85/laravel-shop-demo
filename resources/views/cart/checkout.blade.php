@extends('layouts.main')

@section('title')
    Оформление заказа
@endsection

@section('cart_button')

@endsection

@section('content')
    <div class="site-catalog">
        <h1>Оформление заказа</h1>

        <div class="site-cart">
            <div class="row">
                <div class="col-md-9 mb-5">
                    @include('cart.partials.checkout_products')
                </div>

                <div class="col-md-9">
                    @if($cart->products)
                        @include('cart.partials.checkout_form')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
