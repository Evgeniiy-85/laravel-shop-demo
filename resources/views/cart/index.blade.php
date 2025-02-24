@extends('layouts.main')

@section('title')
    Корзина
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
