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
            'inn' => 'ИНН/КПП',
            'bik' => 'БИК',
            'billing_number' => 'Р/счёт',
            'address' => 'Адрес для отправки закрывающих документов',
            'organization' => 'Наименование организации',
        ];

        return $labels[$key] ?? $key;
    }
}
