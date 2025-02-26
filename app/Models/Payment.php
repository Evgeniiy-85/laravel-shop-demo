<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Payment extends Model {
    use HasFactory;

    public $timestamps = false;

    /**
     * @return Attribute
     */
    protected function payImageUrl(): Attribute {
        return Attribute::make(
            get: fn () =>  $this->pay_image ? Storage::disk('payments')->url($this->pay_image) : asset("images/payments/{$this->pay_name}.png"),
        );
    }


    /**
     * @return false|mixed
     */
    public function payment() {
        $payment = ucfirst($this->pay_name);
        $class = "\App\Modules\Payments\\$payment\\Models\Payment";
        return class_exists($class) ? new $class() : false;
    }


    /**
     * @return Attribute
     */
    protected $fillable = ['pay_title', 'pay_desc',];
}
