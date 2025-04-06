<div class="filter">
    @foreach($list as $item)
        <div class="filter-item @if($item->id == $model_id || request()->input($filter_name) == $item->alias) active @endif">
            <button x-on:click="$wire.$js.filter({{ $item->id }}, '{{ $item->alias }}')">{{ $item->title }}</button>
        </div>
    @endforeach
    <div class="filter-item filter-reset">
        <button x-on:click="$wire.$js.filter(0, '')">Сбросить фильтр</button>
    </div>
</div>

@script
<script>
    $js('filter', (id, alias) => {
        $wire.filter(id)
        window.history.replaceState(null, document.title, id ? `?${$wire.filter_name}=${alias}` : '?reset');
    })
</script>
@endscript
