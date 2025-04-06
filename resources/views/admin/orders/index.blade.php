@extends('admin/layouts.main')

@section('title') {{__('Заказы')}} @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.orders') }} @endsection
@section('h1') {{ __('Заказы') }} @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title"> {{ __('Список заказов') }}</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Дата') }}</th>
                                <th>{{ __('Имя клиента') }}</th>
                                <th>{{ __('Фамилия клиента') }}</th>
                                <th>{{ __('E-mail клиента') }}</th>
                                <th>{{ __('Телефон клиента') }}</th>
                                <th>{{ __('Стоимость') }}</th>
                                <th>{{ __('Статус') }}</th>
                                <th style="width: 30px"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @if($orders->count())
                                @foreach($orders as $order)
                                    <tr class="align-middle">
                                        <td><a href="{{ route('admin.orders.edit', $order->order_id) }}">{{ $order->order_id }}</a></td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->client_name }}</td>
                                        <td>{{ $order->client_surname }}</td>
                                        <td>{{ $order->client_email }}</td>
                                        <td>{{ $order->client_phone }}</td>
                                        <td>{{ $order->order_sum }} {{ Setting::get('currency') }}</td>
                                        <td><span class="badge order-status status-{{ $order->order_status }}">{{ $order->order_status_text }}</span></td>
                                        <td class="user-action-buttons text-right">
                                            @component('admin.components.context_menu', [
                                                'menu' => [
                                                    [
                                                        'icon' => 'fa fa-pencil',
                                                        'title' => __('Редактировать'),
                                                        'href' => route('admin.orders.edit', $order->order_id),
                                                        'class' => 'dont-replace-href',
                                                    ],
                                                    [
                                                        'icon' => 'fa fa-external-link-alt',
                                                        'title' => __('Перейти на страницу оплаты заказа'),
                                                        'href' => route('order.pay', $order->order_id),
                                                        'target' => '_blank',
                                                    ],
                                                    [
                                                        'icon' => 'fa fa-trash',
                                                        'title' => __('Удалить'),
                                                        'href' => route('admin.orders.delete', $order->order_id),
                                                        'onclick' => "return confirm('".__('Вы уверены?')."')",
                                                    ]
                                                ], 'class' => 'float-right'])
                                            @endcomponent
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $orders->links('admin.layouts.paginator') }}
                </div>
            </div>
        </div>
    </div>
@endsection
