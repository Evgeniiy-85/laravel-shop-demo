<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    const ROLE_USER = 1;
    const ROLE_MANAGER = 2;
    const ROLE_ADMIN = 3;

    public const STATUSES = [
        self::STATUS_ACTIVE => 'Активен',
        self::STATUS_DISABLED => 'Отключен',
    ];

    public const ROLES = [
        self::ROLE_USER => 'Пользователь',
        self::ROLE_MANAGER => 'Менеджер ',
        self::ROLE_ADMIN => 'Администратор',
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

    protected $fillable = ['user_email', 'user_name', 'user_surname', 'user_patronymic', 'user_phone', 'user_status', 'user_role'];
}
