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
                    @include('components.advantages')
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
