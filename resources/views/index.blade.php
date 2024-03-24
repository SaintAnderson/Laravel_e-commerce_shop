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

    <div class="Section Section_column Section_columnRight">
        <div class="wrap">
            <div class="Section-column">
                <div class="Section-columnSection Section-columnSection_mark">
                    <div class="media media_advantage">
                        <div class="media-image"><img src="/assets/img/icons/advantages/shipping.svg"
                                                      alt="shipping.svg"/>
                        </div>
                        <div class="media-content">
                            <strong class="media-title">Shipping & Returns
                            </strong>
                            <p class="media-text">World wide shipping
                            </p>
                        </div>
                    </div>
                </div>
                <div class="Section-columnSection Section-columnSection_mark">
                    <div class="media media_advantage">
                        <div class="media-image"><img src="/assets/img/icons/advantages/moneyBack.svg"
                                                      alt="moneyBack.svg"/>
                        </div>
                        <div class="media-content">
                            <strong class="media-title">Money Back
                            </strong>
                            <p class="media-text">Guaranted payments
                            </p>
                        </div>
                    </div>
                </div>
                <div class="Section-columnSection Section-columnSection_mark">
                    <div class="media media_advantage">
                        <div class="media-image"><img src="/assets/img/icons/advantages/support.svg"
                                                      alt="support.svg"/>
                        </div>
                        <div class="media-content">
                            <strong class="media-title">Support Policy
                            </strong>
                            <p class="media-text">Fast support team
                            </p>
                        </div>
                    </div>
                </div>
                <div class="Section-columnSection Section-columnSection_mark">
                    <div class="media media_advantage">
                        <div class="media-image"><img src="/assets/img/icons/advantages/quality.svg"
                                                      alt="quality.svg"/>
                        </div>
                        <div class="media-content">
                            <strong class="media-title">Quality Guarantee
                            </strong>
                            <p class="media-text">Best guaranted items
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @include('components.products.limited-edition-products-slider', ['products' => $limitedEditionProducts])
        </div>
    </div>
    </div>
@endsection
