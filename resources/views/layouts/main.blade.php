<!doctype html>
<html lang="ru">
@include('layouts.head')
@include('layouts.header')
<body>
    <div class="container">
        @yield('breadcrumbs')
        @yield('content')
    </div>
    @include('layouts.footer')
    @include('auth.login-modal')
</body>
</html>
