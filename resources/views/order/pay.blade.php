@extends('layouts.main')

@section('title')
    Оформление заказа
@endsection

@section('content')
    <div class="site-catalog">
        <h1>Выбор оплаты</h1>

        <div class="site-cart">
            <div class="row">
                <div class="col-md-9 mb-5">
                    @include('order.partials.products')
                </div>

                <div class="col-md-9">

                </div>
            </div>
        </div>
    </div>
@endsection
