<?php

namespace App\Modules\Extensions\Trainings\Enums;
use Illuminate\Support\Str;

enum AccessType: int {
    case INHERIT = 1; // ТИП ДОСТУПА - НАСЛЕДОВАТЬ
    case GROUP = 2; // ТИП ДОСТУПА - ПО ГРУППЕ
    case FREE = 3; // ТИП ДОСТУПА - СВОБОДНЫЙ


    /**
     * @param bool $uc_first
     * @return string
     */
    public function label(bool $uc_first = true): string {
        $label = match ($this) {
            self::INHERIT => __('Наследовать'),
            self::GROUP => __('По группе'),
            self::FREE => __('Свободный доступ'),
        };

        return $uc_first ? $label : Str::lower($label);
    }
}
