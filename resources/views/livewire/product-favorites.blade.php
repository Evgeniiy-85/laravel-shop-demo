<div class="product-favorites">
    @if(!isset($favorites->products[$product_id]))
        <button type="button" class="button button-ui btn_a-grey" wire:click="add({{ $product_id }})"></button>
    @else
        <button type="button" class="button button-ui btn_a-grey active" wire:click="remove({{ $product_id }})"></button>
    @endif
</div>
