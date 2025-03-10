<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSetting extends Model {
    use HasFactory;

    public $timestamps = false;

    private array $default =  [
        'columns' => 1,
    ];

    /**
     * @return Attribute
     */
    protected function settings(): Attribute {
        return Attribute::make(
            get: function() {
                $settings = $this->params ? json_decode($this->params, true) : [];
                return (object)array_merge($this->default, $settings);
            }
        );
    }


    /**
     * @var string[]
     */
    protected $fillable = [
        'params',
    ];
}
