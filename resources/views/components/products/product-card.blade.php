<div class="Card"><a class="Card-picture" href="/products/{{ $slug }}"><img src="{{ $src }}" alt="Загрузка..." /></a>
    <div class="Card-content">
        <strong class="Card-title"><a href="/products/{{ $slug }}">{{ $slot }}</a>
        </strong>
        <div class="Card-description">
            <div class="Card-cost">
                @if ($sale) <span class="Card-priceOld">${{ $price }}</span> @endif
                <span class="Card-price">@if ($sale)${{ $price - ($price * $sale / 100) }} @else {{ $price ? '$' . $price : 'Бесплатно' }} @endif</span>
            </div>
            <div class="Card-category">
                {{ $category }}
            </div>
        </div>
    </div>
    @if ($sale)
        <div class="Card-sale">
            -{{ $sale }}%
        </div>
    @endif
</div>
