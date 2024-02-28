<div class="Compare-products">
    @foreach($products as $product)
        <x-compares.compare-product>
            {{ $product->title  }}
            <x-slot:feature>
                <img class="Compare-pict" src="assets/img/content/home/card.jpg" alt="card.jpg"/>
            </x-slot:feature>
        </x-compares.compare-product>
    @endforeach
</div>
