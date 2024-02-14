<?php

namespace App\View\Components\products;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public function __construct(
        public float|null $price = null,
        public string|null $category = null,
        public string $slug = '#',
        public string $src = '#',
        public float|null $sale = null,
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.products.product-card');
    }
}
