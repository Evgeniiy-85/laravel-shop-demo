<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model {

    use HasFactory;

    const MAIL_SEND_TYPE_PHP = 1;
    const MAIL_SEND_TYPE_SWIFT = 2;

    const MAIL_ENCRYPT_TYPE_SSL = 1;
    const MAIL_ENCRYPT_TYPE_TLS = 2;
    const MAIL_ENCRYPT_TYPE_NONE = 3;

    public $timestamps = false;

    public static function getMailSendTypes() {
        return [
            self::MAIL_SEND_TYPE_PHP => 'PHP Mail',
            self::MAIL_SEND_TYPE_SWIFT => 'Swift Mail',
        ];
    }

    public static function getMailEncryptTypes() {
        return [
            self::MAIL_ENCRYPT_TYPE_SSL => 'SSL',
            self::MAIL_ENCRYPT_TYPE_TLS => 'TLS',
            self::MAIL_ENCRYPT_TYPE_NONE => 'Нет'
        ];
    }


    /**
     * @var string[]
     */
    protected $fillable = [
        'params', 'id'
    ];
}
