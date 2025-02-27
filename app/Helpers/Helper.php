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
}
