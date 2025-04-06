<?php

namespace App\Models\Product;

use App\Enums\ActivityStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model {

    use HasFactory;

    public $timestamps = false;

    protected $casts = [
        'status'  => ActivityStatus::class
    ];

    /**
     * @return Attribute
     */
    protected function imageUrl(): Attribute {
        return Attribute::make(
            get: function() {
                return $this->images ? Storage::disk('products')->url($this->images[0]) : asset('/images/no-img.png');
            },
        );
    }

    /**
     * @return mixed
     */
    public function getImagesAttribute() {
        return $this->attributes['images'] ? json_decode($this->attributes['images'], 1) : null;
    }

    public function setImagesAttribute($images) {
        $this->attributes['images'] = collect($images)->toJson();
    }


    /**
     * @param $image
     * @return string
     */
    public function getImageUrl($image) {
        return Storage::disk('products')->url($image);
    }

    /**
     * @param array $options
     * @return bool
     */
    public function save(array $options = []) {
        return parent::save($options);
    }


    /**
     * @var string[]
     */
    protected $fillable = [
        'title', 'category_id', 'alias', 'price', 'quantity', 'status', 'short_desc', 'desc', 'images'
    ];
}
