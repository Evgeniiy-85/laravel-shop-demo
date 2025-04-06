<?php

namespace App\Models\Order;

use App\Enums\OrderStatus;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    public $timestamps = false;
    public $primaryKey = 'order_id';

    protected $casts = [
        'order_status'  => OrderStatus::class
    ];

    /**
     * Get the user's first name.
     */
    protected function paymentTitle(): Attribute {
        return Attribute::make(
            get: fn () => $this->payment_id ? Payment::find($this->payment_id)->pay_title ?? '' : '',
        );
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'order_sum', 'client_name', 'client_surname', 'client_email', 'client_phone',
        'order_date', 'order_status', 'payment_id', 'client_patronymic'
    ];
}
