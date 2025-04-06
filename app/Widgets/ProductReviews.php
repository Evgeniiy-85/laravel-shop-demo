<?php

namespace App\Widgets;

use App\Models\Product\ProductReview;
use Arrilot\Widgets\AbstractWidget;

class ProductReviews extends AbstractWidget {
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
        $reviews = ProductReview
            ::where('review_status', 1)
            ->where('id', $this->config['id'])
            ->join('users', 'product_reviews.user_id', '=', 'users.user_id');

        return view('widgets.product_reviews.reviews', [
            'reviews' => $reviews->get(),
            'count' => $reviews->count(),
            'alias' => $this->config['alias']
        ]);
    }
}
