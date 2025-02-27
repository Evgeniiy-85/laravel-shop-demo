<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFilter extends Model {

    use HasFactory;

    public $min_price;
    public $max_price;
    public $prod_category;
    public $is_filter;
    public $action;

    public function loadFilter($data) {
        $this->action = $data['action'] ?? null;

        if ($this->action == 'apply') {
            $this->min_price = $data['min_price'] ?? null;
            $this->max_price = $data['max_price'] ?? null;
        } else {
            $this->min_price =  $this->max_price = null;
        }

       return true;
    }

    /**
     * @param $products
     * @return void
     */
    public function add(&$products) {
        if ($this->action == 'apply') {
            if ($this->min_price && $this->is_filter = 1) {
                $products->where('prod_price', '>=', $this->min_price);
            }

            if ($this->max_price && $this->is_filter = 1) {
                $products->where('prod_price', '<=', $this->max_price);
            }
        }
    }


    protected $fillable = ['min_price', 'max_price',];
}
