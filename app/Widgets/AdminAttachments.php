<?php

namespace App\Widgets;

use App\models\ProductReview;
use Arrilot\Widgets\AbstractWidget;

class AdminAttachments extends AbstractWidget {

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
        if (array_key_exists('images', $this->config)) {
            return view('admin.widgets.attachments.images', $this->config);
        } else {
            return view('admin.widgets.attachments.image', $this->config);
        }
    }
}
