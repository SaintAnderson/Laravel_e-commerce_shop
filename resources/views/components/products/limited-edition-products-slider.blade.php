<div class="Section-content">
    <div class="Slider Slider_carousel">
        <header class="Section-header Section-header_close">
            <h2 class="Section-title">Ограниченные предложения</h2>
            <div class="Section-control">
                <div class="Slider-navigate"></div>
            </div>
        </header>
        <div class="Slider-box Cards">
            @foreach ($products as $product)
                <div class="Slider-item">
                    <div class="Slider-content">
                        @include('components.products.product-card', ['product' => $product])
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
