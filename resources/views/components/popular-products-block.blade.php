<div class="Section-content">
    <header class="Section-header">
        <h2 class="Section-title">Popular Products
        </h2>
    </header>
    <div class="Cards">
        @foreach($popularProducts as $product)
            @include('components.products.product-card', ['product' => $product])
        @endforeach
    </div>
</div>
