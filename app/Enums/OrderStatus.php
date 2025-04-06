<?php

namespace App\Enums;

enum OrderStatus: int {
    case STATUS_NO_PAID = 0; // ВЫПИСАН СЧЕТ
    case STATUS_PAID = 1; // ЗАКАЗ ОПЛАЧЕН
    case STATUS_INVOICE_ISSUED = 2; // ТРЕБУЕТ ПОДТВЕРЖДЕНИЯ


    public function label(): string {
        return match ($this) {
            self::STATUS_NO_PAID => __('Выписан счет'),
            self::STATUS_PAID => __('Оплачен'),
            self::STATUS_INVOICE_ISSUED => __('Ждет подтверждения'),
        };
    }
}
