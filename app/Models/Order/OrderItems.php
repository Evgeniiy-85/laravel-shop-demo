<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model {
    use HasFactory;

    public $timestamps = false;

    /**
     * @var string[]
     */
    protected $fillable = ['order_id', 'prod_id', 'prod_price', 'prod_title', 'quantity'];
}
