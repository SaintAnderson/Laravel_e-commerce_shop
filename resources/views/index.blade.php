@extends('layouts.default')

@section('content')
    @include('components.slider', $banners)

    <div class="Middle">
        @include('components.pinned-categories-block')
        <div class="Section">
            <div class="wrap">
                <div class="Section-content">
                    <header class="Section-header">
                        <h2 class="Section-title">
                            Популярные товары
                        </h2>
                    </header>
                    @include('components.popular-products-block', $popularProducts)
                </div>
            </div>
        </div>
    </div>
    <div class="Section Section_dark">
        <div class="wrap">
            <div class="Section-content">
                <div class="Slider Slider_carousel">
                    <header class="Section-header">
                        <h2 class="Section-title">Hot Offers
                        </h2>
                        <div class="Section-control">
                            <div class="Slider-navigate">
                            </div>
                        </div>
                    </header>
                    <div class="Slider-box Cards Cards_hz">
                        <div class="Slider-item">
                            <div class="Slider-content">
                                <div class="Card">
                                    <a class="Card-picture" href="#">
                                        <img src="/assets/img/content/home/card.jpg" alt="card.jpg"/>
                                    </a>
                                    <div class="Card-content">
                                        <strong class="Card-title">
                                            <a href="#">Corsair Carbide Series Arctic White Steel</a>
                                        </strong>
                                        <div class="Card-description">
                                            <div class="Card-cost">
                                                <span class="Card-priceOld">$115.00</span>
                                                <span class="Card-price">$85.00</span>
                                            </div>
                                            <div class="Card-category">Games / xbox</div>
                                            <div class="Card-hover">
                                                <a class="Card-btn" href="#">
                                                    <img src="/assets/img/icons/card/bookmark.svg" alt="bookmark.svg"/>
                                                </a>
                                                <a class="Card-btn" href="#">
                                                    <img src="/assets/img/icons/card/cart.svg" alt="cart.svg"/>
                                                </a>
                                                <a class="Card-btn" href="compare.html">
                                                    <img src="/assets/img/icons/card/change.svg" alt="change.svg"/>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="Card-sale">-60%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Slider-item">
                            <div class="Slider-content">
                                <div class="Card"><a class="Card-picture" href="#"><img
                                            src="/assets/img/content/home/card.jpg" alt="card.jpg"/></a>
                                    <div class="Card-content">
                                        <strong class="Card-title"><a href="#">Barand New Phone Smart Business</a>
                                        </strong>
                                        <div class="Card-description">
                                            <div class="Card-cost"><span class="Card-priceOld">$115.00</span><span
                                                    class="Card-price">$85.00</span>
                                            </div>
                                            <div class="Card-category">Games / xbox
                                            </div>
                                            <div class="Card-hover"><a class="Card-btn" href="#"><img
                                                        src="/assets/img/icons/card/bookmark.svg"
                                                        alt="bookmark.svg"/></a><a class="Card-btn" href="#"><img
                                                        src="/assets/img/icons/card/cart.svg" alt="cart.svg"/></a><a
                                                    class="Card-btn" href="compare.html"><img
                                                        src="/assets/img/icons/card/change.svg"
                                                        alt="change.svg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Card-sale">-60%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Slider-item">
                            <div class="Slider-content">
                                <div class="Card"><a class="Card-picture" href="#"><img
                                            src="/assets/img/content/home/card.jpg" alt="card.jpg"/></a>
                                    <div class="Card-content">
                                        <strong class="Card-title"><a href="#">Mavic PRO Mini Drones Hobby RC
                                                Quadcopter</a>
                                        </strong>
                                        <div class="Card-description">
                                            <div class="Card-cost"><span class="Card-priceOld">$115.00</span><span
                                                    class="Card-price">$185.00</span>
                                            </div>
                                            <div class="Card-category">Digital / xbox
                                            </div>
                                            <div class="Card-hover"><a class="Card-btn" href="#"><img
                                                        src="/assets/img/icons/card/bookmark.svg"
                                                        alt="bookmark.svg"/></a><a class="Card-btn" href="#"><img
                                                        src="/assets/img/icons/card/cart.svg" alt="cart.svg"/></a><a
                                                    class="Card-btn" href="compare.html"><img
                                                        src="/assets/img/icons/card/change.svg"
                                                        alt="change.svg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Card-sale">-60%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Slider-item">
                            <div class="Slider-content">
                                <div class="Card"><a class="Card-picture" href="#"><img
                                            src="/assets/img/content/home/card.jpg" alt="card.jpg"/></a>
                                    <div class="Card-content">
                                        <strong class="Card-title"><a href="#">Corsair Carbide Series Arctic White
                                                Steel</a>
                                        </strong>
                                        <div class="Card-description">
                                            <div class="Card-cost"><span class="Card-priceOld">$115.00</span><span
                                                    class="Card-price">$85.00</span>
                                            </div>
                                            <div class="Card-category">Games / xbox
                                            </div>
                                            <div class="Card-hover"><a class="Card-btn" href="#"><img
                                                        src="/assets/img/icons/card/bookmark.svg"
                                                        alt="bookmark.svg"/></a><a class="Card-btn" href="#"><img
                                                        src="/assets/img/icons/card/cart.svg" alt="cart.svg"/></a><a
                                                    class="Card-btn" href="compare.html"><img
                                                        src="/assets/img/icons/card/change.svg"
                                                        alt="change.svg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Card-sale">-60%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Slider-item">
                            <div class="Slider-content">
                                <div class="Card"><a class="Card-picture" href="#"><img
                                            src="/assets/img/content/home/card.jpg" alt="card.jpg"/></a>
                                    <div class="Card-content">
                                        <strong class="Card-title"><a href="#">Barand New Phone Smart Business</a>
                                        </strong>
                                        <div class="Card-description">
                                            <div class="Card-cost"><span class="Card-priceOld">$115.00</span><span
                                                    class="Card-price">$85.00</span>
                                            </div>
                                            <div class="Card-category">Games / xbox
                                            </div>
                                            <div class="Card-hover"><a class="Card-btn" href="#"><img
                                                        src="/assets/img/icons/card/bookmark.svg"
                                                        alt="bookmark.svg"/></a><a class="Card-btn" href="#"><img
                                                        src="/assets/img/icons/card/cart.svg" alt="cart.svg"/></a><a
                                                    class="Card-btn" href="compare.html"><img
                                                        src="/assets/img/icons/card/change.svg"
                                                        alt="change.svg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Card-sale">-60%
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Slider-item">
                            <div class="Slider-content">
                                <div class="Card"><a class="Card-picture" href="#"><img
                                            src="/assets/img/content/home/card.jpg" alt="card.jpg"/></a>
                                    <div class="Card-content">
                                        <strong class="Card-title"><a href="#">Mavic PRO Mini Drones Hobby RC
                                                Quadcopter</a>
                                        </strong>
                                        <div class="Card-description">
                                            <div class="Card-cost"><span class="Card-priceOld">$115.00</span><span
                                                    class="Card-price">$185.00</span>
                                            </div>
                                            <div class="Card-category">Digital / xbox
                                            </div>
                                            <div class="Card-hover"><a class="Card-btn" href="#"><img
                                                        src="/assets/img/icons/card/bookmark.svg"
                                                        alt="bookmark.svg"/></a><a class="Card-btn" href="#"><img
                                                        src="/assets/img/icons/card/cart.svg" alt="cart.svg"/></a><a
                                                    class="Card-btn" href="compare.html"><img
                                                        src="/assets/img/icons/card/change.svg"
                                                        alt="change.svg"/></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Card-sale">-60%
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="Section Section_column Section_columnRight">
        <div class="wrap">
            <div class="Section-column">
                @include('components.advantages')
            </div>
            @include('components.products.limited-edition-products-slider', ['products' => $limitedEditionProducts])
        </div>
    </div>
    </div>
@endsection
