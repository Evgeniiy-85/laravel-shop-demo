<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Setting extends Model {

    use HasFactory;

    const MAIL_SEND_TYPE_PHP = 1;
    const MAIL_SEND_TYPE_SWIFT = 2;

    const MAIL_ENCRYPT_TYPE_SSL = 1;
    const MAIL_ENCRYPT_TYPE_TLS = 2;
    const MAIL_ENCRYPT_TYPE_NONE = 3;

    public $timestamps = false;

    protected $attributes = [
        'params' => [
            'count_items' => 20,
            'site_name' => 'Laravel Shop',
            'logo' => null,
            'currency' => '₽',
            'mail_send_type' => self::MAIL_SEND_TYPE_PHP,
            'mail_encrypt_type' => self::MAIL_ENCRYPT_TYPE_SSL
        ]
    ];

    public function __construct() {
        $this->params = json_encode($this->attributes['params']);
    }

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
     * Get the user's first name.
     */
    protected function logoUrl(): Attribute {
        return Attribute::make(
            get: fn () =>  $this->settings && $this->settings->logo ? Storage::disk('main')->url($this->settings->logo) : asset('/images/icons/logo.svg'),
        );
    }

    /**
     * Get the user's first name.
     */
    protected function faviconUrl(): Attribute {
        return Attribute::make(
            get: fn () =>  $this->settings->favicon ? Storage::disk('main')->url($this->settings->favicon) : asset('/images/icons/favicon.svg'),
        );
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'params'
    ];
}
