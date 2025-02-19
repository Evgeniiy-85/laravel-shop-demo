<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    use HasFactory;

    public const STATUSES = [
        1 => 'Активен',
        0 => 'Отключен',
    ];

    /**
     * @param int|null $status
     * @return int|array
     */
    public static function getStatuses(int|null $status = null) :int|array {
        return $status !== null ? self::STATUSES[$status] : self::STATUSES;
    }
}
