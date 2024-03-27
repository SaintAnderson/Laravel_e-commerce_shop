<div class="Compare-products">
    @foreach($products as $product)
        <x-compares.compare-product>
            {{ $product->title  }}
            <x-slot:feature>
                <img class="Compare-pict" src="{{$product->image_url}}" alt=""/>
            </x-slot:feature>
        </x-compares.compare-product>
    @endforeach
</div>
