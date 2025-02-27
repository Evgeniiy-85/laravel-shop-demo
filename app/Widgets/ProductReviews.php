<?php

namespace App\Widgets;

use App\models\ProductReview;
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
            ::where('review_status', ProductReview::STATUS_ACTIVE)
            ->where('prod_id', $this->config['prod_id'])
            ->join('users', 'product_reviews.user_id', '=', 'users.user_id');

        return view('widgets.product_reviews', [
            'reviews' => $reviews->get(),
            'count' => $reviews->count()
        ]);
    }
}
