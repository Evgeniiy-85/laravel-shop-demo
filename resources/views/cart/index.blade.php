@extends('layouts.main')

@section('title')
    Корзина
@endsection

@section('cart_button')
    <a href="{{ route('cart.checkout')}}" class="button button-ui btn_a-outline-primary button-small">
        Оформить заказ
    </a>
@endsection

@section('content')
    <div class="site-cart">
        <h1>Корзина</h1>

        <div class="row">
            <div class="col-md-9">
                @include('cart.products')
            </div>
        </div>
    </div>
@endsection
