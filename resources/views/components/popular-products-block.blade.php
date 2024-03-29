<div class="Cards">
    @foreach($popularProducts as $product)
        @include('components.products.product-card', ['product' => $product])
    @endforeach
</div>
