<?php

namespace App\Models;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Cart extends Model {
    public int $total = 0;
    public int $count_products = 0;
    public array $products = [];
    public array $quantity = [];
    private string $save_key = 'cart';


    /**
     * @return void
     */
    public function loadCart() {
        $data = Session::get($this->save_key);
        if ($data) {
            $this->total = $data['total'];
            $this->count_products = $data['count_products'];
            $this->products = $data['products'];
            $this->quantity = $data['quantity'];
        }
    }

    /**
     * @return void
     */
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
     * @param int $id
     * @param int $quantity
     * @return bool
     */
    public function changeProduct(int $id, int $quantity) {
        $this->loadCart();
        $product = $this->products[$id] ?? Product::where(['status' => 1, 'id' => $id])->first();
        if (!$product) {
            return false;
        }

        $current_quantity = $this->quantity[$id] ?? 0;
        $new_quantity = $quantity ? $current_quantity + $quantity : 0;

        if ($new_quantity == 0) {
            $this->total -= $product->price * $current_quantity;
            $this->count_products -= $current_quantity;
            unset($this->products[$id]);
            unset($this->quantity[$id]);
        } else {
            $this->total += $product->price * $quantity;
            $this->count_products += $quantity;
            $this->products[$id] = $product;
            $this->quantity[$id] = $new_quantity;
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
