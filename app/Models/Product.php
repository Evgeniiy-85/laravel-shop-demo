<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    protected $attributes = [
        'prod_image' => '',
    ];

    /**
     * @param int|null $status
     * @return int|array
     */
    public static function getStatuses(int|null $status = null) :string|array {
        return $status !== null ? self::STATUSES[$status] : self::STATUSES;
    }

    /**
     * @return Attribute
     */
    protected function prodImageUrl(): Attribute {
        return Attribute::make(
            get: fn () =>  $this->prod_image ? Storage::disk('products')->url($this->prod_image) : asset('/images/no-img.png'),
        );
    }

    /**
     * @var string[]
     */
    protected $fillable = ['prod_title', 'prod_category', 'prod_alias', 'prod_price', 'prod_quantity', 'prod_status',];
}
