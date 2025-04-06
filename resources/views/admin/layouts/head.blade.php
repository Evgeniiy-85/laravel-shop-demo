<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet"  href="{{ asset('css/admin/overlayscrollbars.min.css') }}" />
    <link rel="stylesheet"  href="{{ asset('css/bootstrap-icons.min.css') }}" />
    <link rel="stylesheet"  href="{{ asset('css/v4-shims.css') }}" />
    <link rel="stylesheet"  href="{{ asset('css/v5-shims.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.3.2.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte-custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}" />
    @yield('styles')
</head>
