@extends('admin/layouts.main')

@section('title')
    Редактировать заказ
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.orders.edit') }}
@endsection

@section('h1')
    Редактировать заказ
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Заказ {{ $order->order_id }}</h3>
                </div>

                <form action="{{ route('admin.orders.update', $order->order_id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group"><label>Имя клиента</label>
                                    <input type="text" class="form-control" name="client_name" value="{{ $order->client_name }}">
                                </div>

                                <div class="form-group"><label>Фамилия</label>
                                    <input type="text" class="form-control" name="client_surname" value="{{ $order->client_surname }}">
                                </div>

                                <div class="form-group"><label>Отчество клиента</label>
                                    <input type="text" class="form-control" name="client_patronymic" value="{{ $order->client_patronymic }}">
                                </div>

                                <div class="form-group"><label>E-mail клиента</label>
                                    <input type="email" class="form-control" name="client_email" value="{{ $order->client_email }}">
                                </div>

                                <div class="form-group"><label>Телефон клиента</label>
                                    <input type="email" class="form-control" name="client_phone" value="{{ $order->client_phone }}">
                                </div>

                                <div class="form-group"><label>Статус</label>
                                    <select class="form-control" name="order_status">
                                        @foreach ($statuses as $status => $title)
                                            <option value="{{ $status }}" @if($order->order_status == $status) selected @endif">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="info-box bg-light mt-2 order-info">
                                    <div class="info-box-content">
                                        <strong class="info-box-title mb-1">Заказ</strong>
                                        <span class="info-box-text">Дата заказа: <span class="info-box-value">{{ $order->order_date }}</span></span>
                                        <span class="info-box-text">Дата оплаты: <span class="info-box-value">{{ $order->payment_date }}</span></span>
                                        <span class="info-box-text">Система оплаты: <span class="info-box-value">{{ $order->payment_title }}</span></span>
                                    </div>
                                </div>

                                @if($order->order_params['pay_info'])
                                    <div class="info-box bg-light mt-2 order-info">
                                        <div class="info-box-content">
                                            <strong class="mt-2 mb-1 info-box-title">Платеж</strong>
                                            @foreach($order->order_params['pay_info'] as $key => $value)
                                                <span class="info-box-text">{{ $payment ? $payment->label($key) : $key }}: <span class="info-box-value">{{ $value }}</span></span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
