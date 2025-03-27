<?php

namespace App\Livewire;

use Livewire\Component;

class ProductBuy extends Component {
    public \App\Models\Cart $cart;
    public \App\Models\Product $product;
    protected $listeners = [
        'updateByButton'
    ];

    public function __construct() {
        $this->cart = new \App\Models\Cart();
        $this->cart->loadCart();
    }


    public function buy($prod_id) {
        $this->cart->changeProduct($prod_id, 1);
    }

    public function updateByButton() {
        $this->cart->loadCart();
    }

    public function updateCart() {
        $this->dispatch('updateCart');
    }

    public function render() {
        return view('livewire.product-buy');
    }
}
