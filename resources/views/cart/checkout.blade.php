@extends('layouts.main')

@section('title')
    Оформление заказа
@endsection

@section('content')
    <div class="site-catalog">
        <h1>Оформление заказа</h1>

        <div class="site-catalog">
            <div class="row">
                <div class="col-xl-7 col-lg-8 mb-5">
                    @include('cart.partials.cart_products')
                </div>

                @if($cart->products)
                    @include('order.partials.checkout_form')
                @endif
            </div>
        </div>
    </div>
@endsection
