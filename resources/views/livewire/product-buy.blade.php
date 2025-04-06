<div class="product-by">
    @if(!isset($cart->products[$product->id]))
        <button class="button button-ui btn_a-outline-primary" wire:click="buy({{ $product->id }})" wire:click.prevent="updateCart">Купить</button>
    @else
        <button class="button button-ui btn_a-outline-primary">В корзине</button>
    @endif
</div>
