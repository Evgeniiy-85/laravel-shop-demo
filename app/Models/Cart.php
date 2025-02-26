<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class Cart extends Model {
    public $total = 0;
    public $count_products = 0;
    public $products = [];
    public $quantity = [];
    private $save_key = 'cart';


    public function loadCart() {
        $data = Session::get($this->save_key);
        if ($data) {
            $this->total = $data['total'];
            $this->count_products = $data['count_products'];
            $this->products = $data['products'];
            $this->quantity = $data['quantity'];
        }
    }

    private function saveCart() {
        $data = [
            'total' => $this->total,
            'count_products' => $this->count_products,
            'products' => $this->products,
            'quantity' => $this->quantity,
        ];
        Session::put($this->save_key, $data);
        Session::save();
    }


    /**
     * @param int $prod_id
     * @param int $quantity
     * @return bool
     */
    public function changeProduct(int $prod_id, int $quantity) {
        $this->loadCart();
        $product = $this->products[$prod_id] ?? Product::where(['prod_status' => Product::STATUS_ACTIVE, 'prod_id' => $prod_id])->first();
        if (!$product) {
            return false;
        }

        $current_quantity = $this->quantity[$prod_id] ?? 0;
        $new_quantity = $quantity ? $current_quantity + $quantity : 0;

        if ($new_quantity == 0) {
            $this->total -= $product->prod_price * $current_quantity;
            $this->count_products -= $current_quantity;
            unset($this->products[$prod_id]);
            unset($this->quantity[$prod_id]);
        } else {
            $this->total += $product->prod_price * $quantity;
            $this->count_products += $quantity;
            $this->products[$prod_id] = $product;
            $this->quantity[$prod_id] = $new_quantity;
        }

        $this->saveCart();
    }


    /**
     * @return true
     */
    public function remove() {
        Session::remove($this->save_key);
        return true;
    }

    /**
     * @var string[]
     */
    protected $fillable = ['total', 'count_products', 'products', 'quantity'];
}
