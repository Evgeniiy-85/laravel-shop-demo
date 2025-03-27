<?php

namespace App\Livewire;

use Livewire\Component;

class ProductFavorites extends Component {
    public \App\Models\Favorites $favorites;
    public array $products;
    public int $product_id;
    protected $listeners = [
        'updateByButton'
    ];

    public function __construct() {
        $this->favorites = new \App\Models\Favorites();
        $this->favorites->loadProducts();
    }

    public function add($product_id) {
        $this->favorites->addProduct($product_id);
    }

    public function remove($product_id) {
        $this->favorites->removeProduct($product_id);
    }

    public function render() {
        return view('livewire.product-favorites');
    }
}
