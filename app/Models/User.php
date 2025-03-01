<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable {
    use Notifiable;

    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    const ROLE_USER = 1;
    const ROLE_MANAGER = 2;
    const ROLE_ADMIN = 3;

    const USER_SEX_MAN = 1;
    const USER_SEX_WOMAN = 2;

    public const STATUSES = [
        self::STATUS_ACTIVE => 'Активен',
        self::STATUS_DISABLED => 'Отключен',
    ];

    public const ROLES = [
        self::ROLE_USER => 'Пользователь',
        self::ROLE_MANAGER => 'Менеджер ',
        self::ROLE_ADMIN => 'Администратор',
    ];

    public const SEXES = [
        self::USER_SEX_MAN => 'Мужчина',
        self::USER_SEX_WOMAN => 'Женщина ',
    ];


    public $primaryKey = 'user_id';

    /**
     * @param int|null $status
     * @return int|array
     */
    public static function getStatuses(int|null $status = null) :string|array {
        return $status !== null ? self::STATUSES[$status] : self::STATUSES;
    }

    /**
     * @param int|null $role
     * @return int|array
     */
    public static function getRoles(int|null $role = null) :string|array {
        return $role !== null ? self::ROLES[$role] : self::ROLES;
    }

    /**
     * @param int|null $role
     * @return int|array
     */
    public static function getSexes(int|null $sex = null) :string|array {
        return $sex !== null ? self::SEXES[$sex] : self::SEXES;
    }


    protected function UserPhotoUrl(): Attribute {
        return Attribute::make(
            get: fn () =>  $this->user_photo ? Storage::disk('users')->url($this->user_photo) : asset('/images/'.($this->user_sex == self::USER_SEX_WOMAN ? 'woman.png' : 'man.png')),
        );
    }

    protected $fillable = ['user_email', 'user_password', 'user_name', 'user_surname', 'user_patronymic', 'user_phone', 'user_status', 'user_role', 'user_sex'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_password',
    ];


    public function getAuthPassword() {
        return $this->user_password;
    }


    public function isAdministrator() {
        return $this->user_role == self::ROLE_ADMIN;
    }
}
