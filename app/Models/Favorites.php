<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class Favorites extends Model {

    use HasFactory;

    public $products;
    private $save_key = 'favorites';

    /**
     * @return void
     */
    public function loadProducts() {
        $this->products = Session::get($this->save_key) ?: [];
    }

    /**
     * @return array|mixed
     */
    public function getProducts() {
        $this->loadProducts();
        return $this->products;
    }

    /**
     * @param int $prod_id
     * @return true
     */
    public function addProduct(int $prod_id) {
        $this->loadProducts();
        $this->products[$prod_id] = true;

        return $this->saveProducts();
    }

    /**
     * @param $prod_id
     * @return true
     */
    public function removeProduct($prod_id) {
        $this->loadProducts();
        if ($this->products && isset($this->products[$prod_id])) {
            unset($this->products[$prod_id]);
        }

        return $this->saveProducts();
    }

    /**
     * @return true
     */
    private function saveProducts() {
        Session::put($this->save_key, $this->products);
        Session::save();

        return true;
    }
}
