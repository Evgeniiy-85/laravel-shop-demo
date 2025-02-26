<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use App\Models\Payment;

class Order extends Model {
    use HasFactory;

    const STATUS_NO_PAID = 0;
    const STATUS_PAID = 1;
    const STATUS_INVOICE_ISSUED = 3; // ВЫПИСАН СЧЕТ

    public $timestamps = false;
    public $primaryKey = 'order_id';


    /**
     * @param $status
     * @return string|string[]
     */
    public static function getStatuses($status = false) {
        $statuses = [
            self::STATUS_PAID => 'Оплачен',
            self::STATUS_NO_PAID => 'Не оплачен',
            self::STATUS_INVOICE_ISSUED => 'Ждет подтверждения',
        ];

        return $status !== false ? $statuses[$status] : $statuses;
    }


    /**
     * Get the user's first name.
     */
    protected function orderStatusText(): Attribute {
        return Attribute::make(
            get: fn () =>  self::getStatuses($this->order_status),
        );
    }

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
