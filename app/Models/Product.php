<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    use HasFactory;

    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    public const STATUSES = [
        1 => 'Активен',
        0 => 'Отключен',
    ];

    public $timestamps = false;
    public $primaryKey = 'prod_id';


    /**
     * @param int|null $status
     * @return int|array
     */
    public static function getStatuses(int|null $status = null) :string|array {
        return $status !== null ? self::STATUSES[$status] : self::STATUSES;
    }
}
