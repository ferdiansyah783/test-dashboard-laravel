<?php

use Illuminate\Console\View\Components\Component;
use Illuminate\View\View;

class ProductModal extends Component
{
    public function __construct(public string $title, public string $id, public string $action, public string $method, public string $button)
    {
    }

    public function render(): View
    {
        return view('components.modals.product-modal');
    }
}
