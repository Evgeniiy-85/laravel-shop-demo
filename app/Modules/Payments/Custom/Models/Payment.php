<?php

namespace App\Modules\Payments\Custom\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Payment extends Model {
    use HasFactory;


    /**
     * @param $key
     * @return string
     */
    public function label($key) {
        $labels = [
            'inn' => __('ИНН/КПП'),
            'bik' => __('БИК'),
            'billing_number' => __('Р/счёт'),
            'address' => __('Адрес для отправки закрывающих документов'),
            'organization' => __('Наименование организации'),
        ];

        return $labels[$key] ?? $key;
    }
}
