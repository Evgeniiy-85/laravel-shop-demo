<?php

namespace App\Modules\Extensions\Trainings\Models;

use App\Modules\Extensions\Trainings\Enums\AccessType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Training extends Model {
    use HasFactory;

    public function setParamsAttribute($params) {
        $this->attributes['params'] = collect($params)->toJson();
    }

    /**
     * Get the user's first name.
     */
    protected function imageUrl(): Attribute {
        return Attribute::make(
            get: fn () =>  $this->image ? Storage::disk('trainings')->url($this->image) : asset('/images/no-img.png'),
        );
    }

    /**
     * @return Attribute
     */
    protected function settings(): Attribute {
        return Attribute::make(
            get: function() {
                return $this->params ? json_decode($this->params, true) : [];
            }
        );
    }

    /**
     * @param array|null $filter
     * @return mixed
     */
    public static function getListByFilter(array|null $filter) {
        $trainings = self::where('status', 1);
        if ($filter) {
            foreach ($filter as $key => $value) {
                $trainings = $trainings->where($key, $value);
            }
        }

        return $trainings->get();
    }

    protected $casts = [
        'access_type'  => AccessType::class,
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'title', 'short_desc', 'desc', 'alias', 'image', 'status', 'category_id',
        'seo_title', 'meta_desc', 'meta_keys', 'access_type', 'params', 'is_paid'
    ];
}
