<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $product;
    public $image;

    public function __construct($product, $image = null)
    {
        $this->product = $product;
        $this->image = $image;
    }

    public function render()
    {
        return view('components.product-card');
    }
}