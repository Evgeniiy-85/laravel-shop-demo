@extends('admin/layouts.main')

@section('title') Список заказов @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.orders') }} @endsection
@section('h1') Список заказов @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Список заказов</h3>
                </div>

                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Дата</th>
                                <th>Имя клиента</th>
                                <th>Фамилия клиента</th>
                                <th>E-mail клиента</th>
                                <th>Телефон клиента</th>
                                <th>Стоимость, руб.</th>
                                <th>Статус</th>
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
                                        <td>{{ $order->order_sum }}</td>
                                        <td><span class="badge order-status status-{{ $order->order_status }}">{{ $order->order_status_text }}</span></td>
                                        <td class="user-action-buttons text-right">
                                            @component('admin.components.context_menu', [
                                                'menu' => [
                                                    [
                                                        'icon' => 'fa fa-pencil',
                                                        'title' => 'Редактировать',
                                                        'href' => "/admin/orders/edit/{$order->order_id}",
                                                        'class' => 'dont-replace-href',
                                                    ],
                                                    [
                                                        'icon' => 'fa fa-external-link-alt',
                                                        'title' => 'Перейти на страницу оплаты заказа',
                                                        'href' => "/pay/{$order->order_id}",
                                                        'target' => '_blank',
                                                    ],
                                                    [
                                                        'icon' => 'fa fa-trash',
                                                        'title' => 'Удалить',
                                                        'href' => "/admin/orders/delete/{$order->order_id}",
                                                        'onclick' => 'return confirm(\'Точно удалить?\')',
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

                @if(!$orders->count())
                    <div class="card-footer clearfix">
                        Ничего не найдено
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
