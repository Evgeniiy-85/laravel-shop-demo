<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class UI {

    public static function adminContextMenu($menu = null, $params = null) {
        return view('admin.ui.context_menu.menu', [
            'menu' => $menu
        ]);
    }
}
