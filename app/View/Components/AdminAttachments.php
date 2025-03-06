<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminAttachments extends Component
{
    public array $data;

    /**
     * Create a new component instance.
     */
    public function __construct(array $data) {
        $this->data = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        if (array_key_exists('images', $this->data)) {
            return view('admin.components.attachments.images', $this->data);
        } else {
            return view('admin.components.attachments.image', $this->data);
        }
    }
}
