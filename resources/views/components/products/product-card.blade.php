@php
    $sessionId = \Auth::check() ? auth()->user()->id : \Session::getId();
@endphp
<div class="Card">
    <a class="Card-picture" href="{{ route('products.show', $product) }}">
        <img src="{{ $product->image_url }}"/>
    </a>
    <div class="Card-content">
        <strong class="Card-title">
            <a href="{{ route('products.show', $product) }}">{{ $product->title }}</a>
        </strong>
        <div class="Card-description">
            <div class="Card-cost">
                @if($product->old_price)
                    <span class="Card-priceOld">{{ "$" . $product->old_price }}</span>
                @endif
                <span class="Card-price">{{  "$" . $product->price }}</span>
            </div>
            <div class="Card-category">{{ $product->category->name }}</div>
            <div class="Card-hover">
                <a class="Card-btn" href="{{route('products.show', $product)}}">
                    <img src="{{ asset('assets/img/icons/card/bookmark.svg') }}" alt="bookmark.svg"/>
                </a>
                @if(!\Cart::session($sessionId)->get($product->id))
                    <a class="Card-btn" href="{{route('cart.add', $product)}}">
                        <img src="{{ asset('assets/img/icons/card/cart.svg') }}" alt="cart.svg"/>
                    </a>
                @endif

                @if(session()->get('products_in_comparison') && in_array($product->id, session()->get('products_in_comparison')))
                    <a class="Card-btn delete" data-id="{{ $product->id }}" href="#">
                        <img src="{{ asset('assets/img/icons/card/delete.svg') }}" alt="delete.svg"/>
                    </a>
                @else
                    <a class="Card-btn change" href="#" data-id="{{ $product->id  }}">
                        <img src="{{ asset('assets/img/icons/card/change.svg') }}" alt="change.svg"/>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
