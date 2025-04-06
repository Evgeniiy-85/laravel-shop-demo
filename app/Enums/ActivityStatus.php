<?php

namespace App\Enums;

enum ActivityStatus: int {
    case STATUS_ACTIVE = 1;
    case STATUS_OFF = 0;


    public function label(): string {
        return match ($this) {
            self::STATUS_ACTIVE => __('Включен'),
            self::STATUS_OFF => __('Выключен'),
        };
    }
}
