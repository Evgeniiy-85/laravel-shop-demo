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
     * @param int $id
     * @return true
     */
    public function addProduct(int $id) {
        $this->loadProducts();
        $this->products[$id] = true;

        return $this->saveProducts();
    }

    /**
     * @param $id
     * @return true
     */
    public function removeProduct($id) {
        $this->loadProducts();
        if (isset($this->products[$id])) {
            unset($this->products[$id]);
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
