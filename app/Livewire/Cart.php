<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component {
    public $cart;
    public $product;
    protected $listeners = [
        'updateCart'
    ];

    public function __construct() {
        $this->cart = new \App\Models\Cart();
        $this->cart->loadCart();
    }

    public function append($id) {
        $this->cart->changeProduct($id, 1);
    }

    public function reduce($id) {
        $this->cart->changeProduct($id, -1);
    }

    public function remove($id) {
        $this->cart->changeProduct($id, 0);
    }

    public function updateByButton() {
        $this->dispatch('updateByButton');
    }

    public function updateCart() {
        $this->cart->loadCart();
    }

    public function render() {
        return view('livewire.cart', [
            'cart' => $this->cart,
        ]);
    }
}
