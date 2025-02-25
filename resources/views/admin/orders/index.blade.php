@extends('admin/layouts.main')

@section('title') Список заказов @endsection
@section('breadcrumbs') {{ Breadcrumbs::render('admin.orders') }} @endsection
@section('h1') Список заказов @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover">
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
                            </tr>
                        </thead>

                        <tbody>
                            @if($orders->count())
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_id }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->client_name }}</td>
                                        <td>{{ $order->client_surname }}</td>
                                        <td>{{ $order->client_email }}</td>
                                        <td>{{ $order->client_phone }}</td>
                                        <td>{{ $order->order_sum }}</td>
                                        <td><span class="badge order-status status-{{ $order->order_status }}">{{ $order->order_status_text }}</span></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    @if(!$orders->count())
                        Ничего не найдено
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
