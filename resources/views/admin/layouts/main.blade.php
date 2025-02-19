@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row mb-3">
        <div class="col-sm-6">
            <h1>@yield('h1')</h1>
        </div>

        <div class="col-sm-6" style="justify-items: right;">
            @yield('breadcrumbs')
        </div>
    </div>
@stop

@section('css')
     <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    @if(Request::is('admin'))
        <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('dist/js/chart.js') }}"></script>
    @endif
@stop
