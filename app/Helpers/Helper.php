<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class Helper {
    public static function createAlias($title) {
        $alias = Str::slug($title);

        return $alias;
    }
}
