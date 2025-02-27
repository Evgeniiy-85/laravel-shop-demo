<?php
namespace App\Helpers;

use Illuminate\Support\Str;

class UI {
    static function rating($rating) {
        $count_starts = intval($rating);
        if ($rating - $count_starts > 0.6) {
            $count_starts += 1;
        }

        $html = '';
        $count_empty_stars = 5 - $count_starts;

        if ($count_starts) {
            $src = asset('/images/icons/rating-star.svg');
            $img = "<img src=\"$src\">";
            $item = "<div class=\"rating-item\">$img</div>";
            $html = str_repeat($item, $count_starts);
        }

        if ($rating - $count_starts > 0.3) {
            $src = asset('/images/icons/rating-star-half.svg');
            $img = "<img src=\"$src\">";
            $item = "<div class=\"rating-item\">$img</div>";
            $count_empty_stars -= 1;
        }

        if ($count_empty_stars > 0) {
            $src = asset('/images/icons/rating-star-empty.svg');
            $img = "<img src=\"$src\">";
            $item = "<div class=\"rating-item\">$img</div>";
            $html .= str_repeat($item, $count_empty_stars);
        }

        return "<div class=\"rating\" data-rating=\"$rating\">$html</div>";
    }
}
