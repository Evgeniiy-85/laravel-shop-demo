@extends('admin/layouts.main')

@section('title')
    {{ __('Редактировать заказ') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('admin.orders.edit') }}
@endsection

@section('h1')
    {{ __('Редактировать заказ') }}
@endsection

@section('content')
    <div class="row mb-3">
        <div class="col-md-7">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Заказ') }} {{ $order->order_id }}</h3>
                </div>

                <form action="{{ route('admin.orders.update', $order->order_id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3"><label class="form-label">{{ __('Имя') }}</label>
                                    <input type="text" class="form-control" name="client_name" value="{{ $order->client_name }}" required>
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('Фамилия') }}</label>
                                    <input type="text" class="form-control" name="client_surname" value="{{ $order->client_surname }}" required>
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('Отчество') }}</label>
                                    <input type="text" class="form-control" name="client_patronymic" value="{{ $order->client_patronymic }}">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('E-mail') }}</label>
                                    <input type="email" class="form-control" name="client_email" value="{{ $order->client_email }}">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('Телефон') }}</label>
                                    <input type="text" class="form-control" name="client_phone" value="{{ $order->client_phone }}">
                                </div>

                                <div class="form-group mb-3"><label class="form-label">{{ __('Статус') }}</label>
                                    <select class="form-control" name="order_status">
                                        @foreach(\App\Enums\OrderStatus::cases() as $type)
                                            <option value="{{ $type->value }}" @if($order->order_status == $type) selected @endif>{{ $type->label() }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="info-box bg-light mt-2 order-info">
                                    <div class="info-box-content">
                                        <strong class="info-box-title mb-1">{{ __('Заказ') }}</strong>
                                        <span class="info-box-text">{{ __('Дата заказа') }}: <span class="info-box-value">{{ $order->order_date }}</span></span>
                                        <span class="info-box-text">{{ __('Дата оплаты') }}: <span class="info-box-value">{{ $order->payment_date }}</span></span>
                                        <span class="info-box-text">{{ __('Система оплаты') }}: <span class="info-box-value">{{ $order->payment_title }}</span></span>
                                    </div>
                                </div>

                                @if(isset($order->order_params['pay_info']))
                                    <div class="info-box bg-light mt-2 order-info">
                                        <div class="info-box-content">
                                            <strong class="mt-2 mb-1 info-box-title">{{ __('Платеж') }}</strong>
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
                        <button type="submit" class="btn btn-primary float-end">{{ __('Сохранить') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
