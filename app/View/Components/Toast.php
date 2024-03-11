<?php

use Illuminate\Console\View\Components\Component;
use Illuminate\View\View;

class ProductModal extends Component
{
    public function __construct(public string $text)
    {
    }

    public function render(): View
    {
        return view('components.toasts.popup');
    }
}
