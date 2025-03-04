<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Category extends Model {
    use HasFactory;

    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    public const STATUSES = [
        1 => 'Активен',
        0 => 'Отключен',
    ];

    public $primaryKey = 'cat_id';
    public $timestamps = false;

    /**
     * @param int|null $status
     * @return int|array
     */
    public static function getStatuses(int|null $status = null) :string|array {
        return $status !== null ? self::STATUSES[$status] : self::STATUSES;
    }


    /**
     * Get the user's first name.
     */
    protected function catImageUrl(): Attribute {
        return Attribute::make(
            get: fn () =>  $this->cat_image ? Storage::disk('categories')->url($this->cat_image) : asset('/images/no-img.png'),
        );
    }


    /**
     * @return Attribute
     */
    protected $fillable = ['cat_title', 'cat_parent', 'cat_alias', 'cat_status', 'cat_image'];
}
