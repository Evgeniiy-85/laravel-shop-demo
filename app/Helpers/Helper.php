<?php
namespace App\Helpers;

class Helper {
    /**
     * ДОБАВИТЬ ОКОНЧАНИЕ ТЕКСТА В ЗАВИСИМОСТИ ОТ КОЛИЧЕСТВА
     * @param $quantity
     * @param $text
     * @return mixed
     */
    public static function addTermination($quantity, $text) {
        $term = '';

        if (strpos($text, "ль[TRMNT]") !== false) {
            $text = str_replace('ль[TRMNT]', 'л[TRMNT]', $text);

            if (preg_match('/(5|6|7|8|9|0|1[0-9])$/', $quantity)) {
                $term = 'ей';
            } elseif (preg_match('/1$/', $quantity)) {
                $term = 'ь';
            } elseif (preg_match('/(2|3|4)$/', $quantity)) {
                $term = 'я';
            }
        } else {
            if (preg_match('/(5|6|7|8|9|0|1[0-9])$/', $quantity)) {
                $term = 'ов';
            } elseif (preg_match('/(2|3|4)$/', $quantity)) {
                $term = 'а';
            }
        }

        return str_replace('[TRMNT]', $term, $text);
    }


    /**
     * Возвращает название месяца на русском языке
     * @param int $month_number
     * @return String
     */
    public static function getMonthNameByNum(int $month_number): String {
        $monthes = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

        return $monthes[$month_number-1];
    }

    public static function formatPrice($price) {
        return $price ? number_format($price, 0, ',', ' ') : 0;
    }


    /**
     * @param $count
     * @return string
     */
    public static function formatQuantity($count) {
        return $count < 1000 ? $count : number_format($count / 1000, 1).'k';
    }
}
