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

    protected $casts = [
        'params'  => 'array',
    ];

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
     * @return mixed
     */
    public function getSettingsAttribute() {
        $settings = (object)array_merge(config('settings'), $this->params ?? []);
        $settings->logo_url = self::getLogoUrl($settings);
        $settings->favicon_url = self::getFaviconUrl($settings);

        return $settings;
    }

    /**
     * @param string|null $key
     * @return object|string|null
     */
    public static function get(string|null $key = null) : object|string|null {
        static $settings;

        try {
            $settings = self::first()->settings;
        } catch(\Exception $exception) {
            $settings = (new static())->settings;
        }

        return $key ? $settings->$key : $settings;
    }

    /**
     * @param $settings
     * @return string
     */
    private static function getLogoUrl($settings): string {
        return !empty($settings->logo) ? Storage::disk('main')->url($settings->logo) : asset('/images/icons/logo.svg');
    }

    /**
     * @param $settings
     * @return string
     */
    private static function getFaviconUrl($settings): string {
        return !empty($settings->favicon) ? Storage::disk('main')->url($settings->favicon) : asset('/images/icons/favicon.svg');
    }

    /**
     * @var string[]
     */
    protected $fillable = [
        'params'
    ];
}
