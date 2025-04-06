<div>
    @if($list && $list->count())
        @include($include)
    @else
        <p>Ничего не найдено</p>
    @endif
</div>
