<!doctype html>
<html lang="en">
    @include('admin.layouts.head')

    <body class="layout-fixed sidebar-expand-lg sidebar-mini bg-body-tertiary">
        <div class="app-wrapper">
            @include('admin.layouts.navbar')
            @include('admin.layouts.sidebar')

            <main class="app-main">
                @include('admin.layouts.header')
                @include('admin.layouts.content')
            </main>
            @include('admin.layouts.footer')
        </div>
        @include('admin.layouts.scripts')
    </body>
</html>
