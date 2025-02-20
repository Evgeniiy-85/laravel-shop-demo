<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class Helper {
    public static function createAlias($title) {
        $alias = Str::ascii(str_replace(' ', '-', $title));

        return strtolower($alias);
    }
}
