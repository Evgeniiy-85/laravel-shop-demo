@extends('admin/layouts.main')

@section('title')
    Список продуктов
@endsection

@section('content_header')
    <h1>Список продуктов</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $statistics['new_orders'] }}</h3>
                    <p>Новых заказов</p>
                </div>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $statistics['pay_orders'] }}</h3>
                    <p>Оплаченных заказов</p>
                </div>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ \App\Helpers\Helper::formatPrice($statistics['new_orders_sum']) }}</h3>
                    <p>Заработано</p>
                </div>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-orange color-palette">
                <div class="inner">
                    <h3>{{ $statistics['new_clients'] }}</h3>
                    <p>Новых клиентов</p>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Продажи
                    </h3>
                </div><!-- /.card-header -->

                <div class="card-body">
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;" data-chart="{{ collect($statistics['chart'])->toJson()}}">
                            <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                        </div>
                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                            <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
        </section>
    </div>
@endsection

<script src="{{ asset('js/admin/Chart.min.js') }}"></script>
<script src="{{ asset('js/admin/chart.js') }}"></script>
