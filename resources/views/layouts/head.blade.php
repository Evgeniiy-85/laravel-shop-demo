<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ $settings->favicon_url }}" rel="shortcut icon" type="image/vnd.microsoft.icon" />

    <title>{{ $settings->site_name }}</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet"  href="{{ asset('css/bootstrap-icons.min.css') }}" />
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/v4-shims.css') }}" rel="stylesheet" />

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    <style>
        .products-list {
            grid-template-columns: repeat(auto-fill, minmax(min-content, calc({{ number_format(100 / $products_settings->columns, 2) }}% - 10px)));
        }
    </style>
</head>
