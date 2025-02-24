<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    const STATUS_NO_PAID = 0;
    const STATUS_PAID = 1;
    const STATUS_INVOICE_ISSUED = 3; // ВЫПИСАН СЧЕТ

    public $timestamps = false;
    public $primaryKey = 'order_id';

    /**
     * @var string[]
     */
    protected $fillable = ['order_sum', 'client_name', 'client_surname', 'client_email', 'client_phone', 'order_date'];
}
