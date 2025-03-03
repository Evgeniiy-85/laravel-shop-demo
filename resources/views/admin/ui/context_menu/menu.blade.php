<div class="context-menu float-right">
    <span class="context-button" title="Меню">
        <span></span><span></span><span></span></span>
    <ul class="context-menu-list">
        @foreach ($menu as $item)
            <li>
                <a class="{{ $item['class'] ?? '' }}" href="{{ $item['href'] }}" @if(isset($item['target'])) target="{{ $item['target'] }}" @endif>
                    <span class="{{ $item['icon'] }}"></span> {{ $item['title'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>