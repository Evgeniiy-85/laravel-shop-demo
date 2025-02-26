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
        'order_sum', 'client_name', 'client_surname', 'client_email',
        'client_phone', 'order_date', 'order_status', 'payment_id'
    ];


    public function getOrderInfo() {
        if ($this->order_params) {
            $params = json_decode($this->order_params, true);
            if (isset($params['pay_info'])) {
                $payment = Payment::find($this->payment_id);
                $pay_name = ucfirst($payment->pay_name);
                $class = "\App\Modules\Payments\\{$pay_name}\\Models\Payment";
                $payment_obj = new $class();
                $labels = $payment_obj->attributeLabels();



                print_r($params['pay_info']);exit;
$text = array_combine (array_keys($params['pay_info']), array_values($labels));

                print_r($params['pay_info']);exit;


                print_r($obj);exit;


            }

        }


        print_r($this->order_params);exit;

        $keys = [
            'inn' => 'ИНН/КПП',
            'bik' => 'БИК',
            'billing_number' => 'Р/счёт',
            'address' => 'Адрес для отправки закрывающих документов',

        ];

        if (1) {

        }



        return $keys[$key] ?? $key;
    }
}
