<div class="Section-content">
    <header class="Section-header">
        <h2 class="Section-title">Popular Products
        </h2>
    </header>
    <div class="Cards">
        @foreach($popularProducts as $product)
            <div class="Card"><a class="Card-picture" href="#"><img src="assets/img/content/home/card.jpg"
                                                                    alt="card.jpg" /></a>
                <div class="Card-content">
                    <strong class="Card-title"><a href="#">{{ $product->title }}</a>
                    </strong>
                    <div class="Card-description">
                        <div class="Card-cost">
                            @if($product->priceOld)<span class="Card-priceOld">{{ "$" . $product->priceOld }}</span>@endif
                            <span class="Card-price">{{  "$" . $product->price }}</span>
                        </div>
                        <div class="Card-hover"><a class="Card-btn" href="#"><img
                                    src="assets/img/icons/card/bookmark.svg" alt="bookmark.svg" /></a><a
                                class="Card-btn" href="#"><img src="assets/img/icons/card/cart.svg"
                                                               alt="cart.svg" /></a><a class="Card-btn" href="compare.html"><img
                                    src="assets/img/icons/card/change.svg" alt="change.svg" /></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
