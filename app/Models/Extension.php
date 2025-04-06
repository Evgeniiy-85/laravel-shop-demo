<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Extension extends Model {
    use HasFactory;

    /**
     * @return Attribute
     */
    protected function settings(): Attribute {
        return Attribute::make(
            get: function() {
                return (object)($this->params ? json_decode($this->params, true) : []);
            }
        );
    }


    /**
     * @return Attribute
     */
    protected $fillable = ['params',];
}
