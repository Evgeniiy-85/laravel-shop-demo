<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdminContextMenu extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public array $menu) {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('admin.components.context_menu', [
            'menu' => $this->menu
        ]);
    }
}
