<div class="Card"><a class="Card-picture" href="{{ route('products.show', ['slug' => $product->slug]) }}"><img src="/assets/img/content/home/card.jpg" alt="Загрузка..." /></a>
    <div class="Card-content">
        <strong class="Card-title"><a href="{{ route('products.show', ['slug' => $product->slug]) }}">{{ $product->title }}</a>
        </strong>
        <div class="Card-description">
            <div class="Card-cost">
                {{-- @if ($sale) <span class="Card-priceOld">${{ $product->price }}</span> @endif --}}
                <span class="Card-price">${{ $product->price }}</span>
            </div>
            <div class="Card-category">
                @if($product->category) {{ $product->category->name }} @endif
            </div>
            <div class="Card-hover"><a class="Card-btn" href="#"><img
                src="/assets/img/icons/card/bookmark.svg" alt="bookmark.svg" /></a><a
            class="Card-btn" href="#"><img src="/assets/img/icons/card/cart.svg"
                alt="cart.svg" /></a><a class="Card-btn" href="#"><img
                src="/assets/img/icons/card/change.svg" alt="#" /></a>
            </div>
        </div>
    </div>
    {{-- @if ($sale)
        <div class="Card-sale">
            -{{ $sale }}%
        </div>
    @endif --}}
</div>
