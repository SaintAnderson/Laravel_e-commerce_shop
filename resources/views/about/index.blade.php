@extends('layouts.default')

@section('content')

    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    <h1 class="Middle-title">О {{ $title }}
                    </h1>
                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="index.html">home</a>
                        </li>
                        <li class="breadcrumbs-item breadcrumbs-item_current"><span>About Us</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Section Section_column Section_columnLeft Section_columnWide">
            <div class="wrap">
                <div class="Section-column">
                    <div class="Section-columnSection Section-columnSection_mark">
                        <div class="media media_advantage">
                            <div class="media-image"><img src="assets/img/icons/advantages/shipping.svg" alt="shipping.svg"/>
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
                            <div class="media-image"><img src="assets/img/icons/advantages/moneyBack.svg" alt="moneyBack.svg"/>
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
                            <div class="media-image"><img src="assets/img/icons/advantages/support.svg" alt="support.svg"/>
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
                            <div class="media-image"><img src="assets/img/icons/advantages/quality.svg" alt="quality.svg"/>
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
                <div class="Section-content">
                    <article class="Article">
                        <div class="Article-section">
                            <div class="row row_verticalCenter row_maxHalf">
                                <div class="row-block">
                                    <div class="pict"><img src="assets/img/content/home/bigGoods.png" alt="bigGoods.png"/>
                                    </div>
                                </div>
                                <div class="row-block">
                                    <h2>{{ $title }}
                                    </h2>
                                    <p>{{ $description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                    <div>
                        <header class="Section-header">
                            <h2 class="Section-title">
                                Популярное
                            </h2>
                        </header>
                        @include('components.popular-products-block')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
