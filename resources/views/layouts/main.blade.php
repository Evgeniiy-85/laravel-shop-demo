<!doctype html>
<html lang="en">
@include('layouts.head')
@include('layouts.header')
<body>
    <div class="container">
        @yield('breadcrumbs')
        @yield('content')
    </div>
    @include('layouts.footer')
</body>
</html>
