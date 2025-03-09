<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSetting extends Model {
    use HasFactory;

    public $timestamps = false;

    protected $attributes = [
        'params' => [
            'width' => 100,
        ]
    ];

    public function __construct() {
        $this->params = json_encode($this->attributes['params']);
    }


    /**
     * @return Attribute
     */
    protected function settings(): Attribute {
        return Attribute::make(
            get: function() {
                return $this->params ? json_decode($this->params) : null;
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
