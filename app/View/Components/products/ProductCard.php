<?php

namespace App\View\Components\products;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public float|null $fullprice = null;
    public float|null $sale;
    public string|null $photo;
    public function __construct(
        public Product $product,
    ) {
        $this->photo = $product->photos->first() ? asset(optional($product->photos->first())->src) : env('IMAGE_PRODUCT_DEFAULT', null);
        $this->sale = $product->discount ? $product->discount->precent : null;
        $this->fullprice = $product->price - ($product->price * $this->sale / 100);
    }

    public function render(): View|Closure|string
    {
        return view('components.products.product-card');
    }
}
