@extends('layouts.main')

@section('title')
    Спасибо! Ваш заказ ждёт подтверждения.
@endsection

@section('content')
    <div class="site-catalog">
        <div class="row">
            <div class="col-9">
                <div class="c-card">
                    <div class="c-card-header mb-3">
                        <h2>Спасибо! Ваш заказ ждёт подтверждения.</h2>
                    </div>

                    <div class="c-card-body">
                        <a href="/load/invoice/schet-1740471402.pdf" class="button button-ui btn_a-primary button-small" target="_blank">Скачать счёт</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
