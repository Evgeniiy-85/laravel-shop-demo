<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use View;

class Rating extends AbstractWidget {

    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run() {
        $rating = $this->config['rating'];
        $count_starts = intval($rating);

        if ($rating - $count_starts > 0.6) {
            $count_starts += 1;
        }

        $html = '';
        $count_empty_stars = 5 - $count_starts;

        if ($count_starts) {
            $src = asset('/images/icons/rating-star.svg');
            $view = View::make('widgets.rating.partials.item', ['src' => $src]);
            $html = str_repeat($view->render(), $count_starts);
        }

        if ($rating - $count_starts > 0.3) {
            $src = asset('/images/icons/rating-star-half.svg');
            $html .= View::make('widgets.rating.partials.item', ['src' => $src]);
            $count_empty_stars -= 1;
        }

        if ($count_empty_stars > 0) {
            $src = asset('/images/icons/rating-star-empty.svg');
            $view = View::make('widgets.rating.partials.item', ['src' => $src]);
            $html .= str_repeat($view, $count_empty_stars);
        }

        return view('widgets.rating.rating', [
            'rating' => $rating,
            'html' => $html
        ]);
    }
}
