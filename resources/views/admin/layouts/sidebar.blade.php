<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <div class="sidebar-brand">
        <a href="../index.html" class="brand-link">
            <img src="/images/admin/logo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow"/>

            <span class="brand-text fw-light">AdminLTE 4</span>
        </a>
    </div>

    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                @foreach(config('adminmenu') as $menu_item)
                    @php
                        $is_active = isset($menu_item['active']) && \Illuminate\Support\Facades\Route::is($menu_item['active']);
                        $icon = $menu_item['icon'] ?? 'bi-circle';
                    @endphp

                    <li class="nav-item{{ $is_active && isset($menu_item['submenu']) ? ' menu-open' : ''}}">
                        <a href="{{ isset($menu_item['url']) ? route($menu_item['url']) : '#' }}" class="nav-link{{$is_active  ? ' active' : '' }}">
                            <i class="nav-icon bi {{ $icon }}"></i>
                            <p>
                                {{ $menu_item['text'] }}
                                @if(isset($menu_item['submenu']))
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                @endif
                            </p>
                        </a>

                        @if(isset($menu_item['submenu']))
                            <ul class="nav nav-treeview">
                                @foreach($menu_item['submenu'] as $submenu_item)
                                    @php
                                        $is_active = isset($submenu_item['active']) && \Illuminate\Support\Facades\Route::is($submenu_item['active']);
                                        $icon = $submenu_item['icon'] ?? 'bi-circle';
                                        @endphp

                                    <li class="nav-item">
                                        <a href="{{ isset($submenu_item['url']) ? route($submenu_item['url']) : '#' }}" class="nav-link{{ $is_active ? ' active' : '' }}">
                                            <i class="nav-icon bi {{ $icon }}"></i>
                                            <p>{{ $submenu_item['text'] }}</p>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
