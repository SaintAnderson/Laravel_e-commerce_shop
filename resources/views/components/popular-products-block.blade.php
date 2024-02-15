<div class="Section-content">
    <header class="Section-header">
        <h2 class="Section-title">Popular Products
        </h2>
    </header>
    <div class="Cards">
        @foreach($popularGoods as $good)
            <div class="Card"><a class="Card-picture" href="#"><img src="assets/img/content/home/card.jpg"
                                                                    alt="card.jpg" /></a>
                <div class="Card-content">
                    <strong class="Card-title"><a href="#">{{ $good->title }}</a>
                    </strong>
                    <div class="Card-description">
                        <div class="Card-cost"><span class="Card-priceOld">{{ "$" . $good->priceOld }}</span><span
                                class="Card-price">{{  "$" . $good->price }}</span>
                        </div>
                        <div class="Card-hover"><a class="Card-btn" href="#"><img
                                    src="assets/img/icons/card/bookmark.svg" alt="bookmark.svg" /></a><a
                                class="Card-btn" href="#"><img src="assets/img/icons/card/cart.svg"
                                                               alt="cart.svg" /></a><a class="Card-btn" href="compare.html"><img
                                    src="assets/img/icons/card/change.svg" alt="change.svg" /></a>
                        </div>
                    </div>
                </div>
                <div class="Card-sale">
                    @php
                    function calculateDiscountPercentage($oldPrice, $newPrice) {
                        if ($oldPrice == 0) {
                        return 0;
                        }

                        $discount = (($oldPrice - $newPrice) / $oldPrice) * 100;

                        return round($discount, 2);
                        }
                        echo "-" . calculateDiscountPercentage($good->priceOld, $good->price) . "%"
                    @endphp
                </div>
            </div>
        @endforeach
    </div>
</div>
