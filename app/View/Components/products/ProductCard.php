<?php

namespace App\View\Components\products;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public float|null $pricesale = null;
    public function __construct(
        public float|null $price = null,
        public string|null $category = null,
        public string $slug = '#',
        public string $src = '#',
        public float|null $sale = null,
    ) {
        $this->pricesale = $price - ($price * $sale / 100);
    }

    public function render(): View|Closure|string
    {
        return view('components.products.product-card');
    }
}
