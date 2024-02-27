@extends('layouts.default')

@section('content')
    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    <h1 class="Middle-title">Сравнение товаров
                    </h1>
                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="index.html">home</a>
                        </li>
                        <li class="breadcrumbs-item breadcrumbs-item_current"><span>Сравнение товаров</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Section">
            <div class="wrap">
                <article class="Article">
                    <p>Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности обеспечивает
                        широкому кругу (специалистов) участие в формировании системы обучения кадров, соответствует
                        насущным потребностям. Идейные соображения высшего порядка, а также консультация с широким
                        активом требуют определения и уточнения соответствующий условий активизации.
                    </p>
                </article>
                <div class="Compare">
                    @foreach($productByCategory as $category_id => $products)
                        <div class="Compare-header " style="margin-top: 50px; text-align: center">
                            <h3>{{ $products->first()->category->name }}</h3>
                        </div>
                        @foreach($products as $product)

                            @foreach($product->specification as $specification)
                                <div class="Compare-row">
                                <div class="Compare-title Compare-title_blank">
                                </div>
                                <div class="Compare-products">
                                    <div class="Compare-product">
                                        <div class="Compare-nameProduct Compare-nameProduct_main">
                                        </div>
                                        <div class="Compare-feature">
                                            <img class="Compare-pict" src="{{ asset('assets/img/content/home/card.jpg') }}"
                                                 alt="card.jpg"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="Compare-row">
                                    <div class="Compare-title">{{ $specification->name }}</div>
                                    @foreach($products as $product)
                                        <div class="Compare-products">
                                            <div class="Compare-product">
                                                <div class="Compare-nameProduct">{{ $product->title }}</div>
                                                <div class="Compare-feature">
                                                    {{ sprintf('%s %s', $specification->pivot->value, $specification->measure) }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

{{--                        <div class="Compare-row">--}}
{{--                            <div class="Compare-title Compare-title_blank">--}}
{{--                            </div>--}}
{{--                            <div class="Compare-products">--}}
{{--                                @foreach($products as $product)--}}
{{--                                    <div class="Compare-product">--}}
{{--                                        <div class="Compare-nameProduct">{{ $product->title }}</div>--}}
{{--                                        <div class="Compare-feature">--}}
{{--                                            <a class="Compare-btn" href="#">--}}
{{--                                                <img src="{{ asset('assets/img/icons/card/cart.svg') }}" alt="cart.svg"/>--}}
{{--                                            </a>--}}
{{--                                            <a class="Compare-btn delete" data-id="{{ $product->id }}" href="#">--}}
{{--                                                <img src="{{ asset('assets/img/icons/card/delete.svg') }}"--}}
{{--                                                     alt="delete.svg"/>--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="Compare-row">--}}
{{--                            <div class="Compare-title">Рейтинг--}}
{{--                            </div>--}}
{{--                            @foreach($products as $product)--}}
{{--                                <div class="Compare-products">--}}
{{--                                    <div class="Compare-product">--}}
{{--                                        <div class="Compare-nameProduct">{{ $product->title }}</div>--}}
{{--                                        <div class="Compare-feature">--}}
{{--                                            <div class="Rating">--}}
{{--                                                <div class="Rating-stars"><span class="Rating-star Rating-star_view">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18">--}}
{{--                          <g>--}}
{{--                            <g>--}}
{{--                              <path fill="#ffc000"--}}
{{--                                    d="M9.5 14.925L3.629 18l1.121-6.512L0 6.875l6.564-.95L9.5 0l2.936 5.925 6.564.95-4.75 4.613L15.371 18z"></path>--}}
{{--                            </g>--}}
{{--                          </g>--}}
{{--                        </svg></span><span class="Rating-star Rating-star_view">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18">--}}
{{--                          <g>--}}
{{--                            <g>--}}
{{--                              <path fill="#ffc000"--}}
{{--                                    d="M9.5 14.925L3.629 18l1.121-6.512L0 6.875l6.564-.95L9.5 0l2.936 5.925 6.564.95-4.75 4.613L15.371 18z"></path>--}}
{{--                            </g>--}}
{{--                          </g>--}}
{{--                        </svg></span><span class="Rating-star Rating-star_view">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18">--}}
{{--                          <g>--}}
{{--                            <g>--}}
{{--                              <path fill="#ffc000"--}}
{{--                                    d="M9.5 14.925L3.629 18l1.121-6.512L0 6.875l6.564-.95L9.5 0l2.936 5.925 6.564.95-4.75 4.613L15.371 18z"></path>--}}
{{--                            </g>--}}
{{--                          </g>--}}
{{--                        </svg></span><span class="Rating-star Rating-star_view">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18">--}}
{{--                          <g>--}}
{{--                            <g>--}}
{{--                              <path fill="#ffc000"--}}
{{--                                    d="M9.5 14.925L3.629 18l1.121-6.512L0 6.875l6.564-.95L9.5 0l2.936 5.925 6.564.95-4.75 4.613L15.371 18z"></path>--}}
{{--                            </g>--}}
{{--                          </g>--}}
{{--                        </svg></span><span class="Rating-star">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18">--}}
{{--                          <g>--}}
{{--                            <g>--}}
{{--                              <path fill="#ffc000"--}}
{{--                                    d="M9.5 14.925L3.629 18l1.121-6.512L0 6.875l6.564-.95L9.5 0l2.936 5.925 6.564.95-4.75 4.613L15.371 18z"></path>--}}
{{--                            </g>--}}
{{--                          </g>--}}
{{--                        </svg></span>--}}
{{--                                                </div>--}}
{{--                                                <div class="Rating-title">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        <div class="Compare-row">--}}
{{--                            <div class="Compare-title">Частота процессора--}}
{{--                            </div>--}}
{{--                            @foreach($products as $product)--}}
{{--                                <div class="Compare-products">--}}
{{--                                    <div class="Compare-product">--}}
{{--                                        <div class="Compare-nameProduct">{{ $product->title }}</div>--}}
{{--                                        <div class="Compare-feature">2.2 ГГц--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        <div class="Compare-row Compare-row_hide">--}}
{{--                            <div class="Compare-title">Время зарядки от сети--}}
{{--                            </div>--}}
{{--                            @foreach($products as $product)--}}
{{--                                <div class="Compare-products">--}}
{{--                                    <div class="Compare-product">--}}
{{--                                        <div class="Compare-nameProduct">{{ $product->title }}</div>--}}
{{--                                        <div class="Compare-feature">3 часа--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        <div class="Compare-row">--}}
{{--                            <div class="Compare-title">Время работы от батареи--}}
{{--                            </div>--}}
{{--                            @foreach($products as $product)--}}
{{--                                <div class="Compare-products">--}}
{{--                                    <div class="Compare-product">--}}
{{--                                        <div class="Compare-nameProduct">{{ $product->title }}</div>--}}
{{--                                        <div class="Compare-feature">3 часа--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        <div class="Compare-row">--}}
{{--                            <div class="Compare-title">Разъемы usb</div>--}}
{{--                            @foreach($products as $product)--}}
{{--                                <div class="Compare-products">--}}
{{--                                    <div class="Compare-product">--}}
{{--                                        <div class="Compare-nameProduct">{{ $product->title }}</div>--}}
{{--                                        <div class="Compare-feature">3--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                        <div class="Compare-row">--}}
{{--                            <div class="Compare-title">Цена--}}
{{--                            </div>--}}
{{--                            @foreach($products as $product)--}}
{{--                                <div class="Compare-products">--}}
{{--                                    <div class="Compare-product">--}}
{{--                                        <div class="Compare-nameProduct">{{ $product->title }}</div>--}}
{{--                                        <div class="Compare-feature">--}}
{{--                                            <strong class="Compare-priceOld">$115.00--}}
{{--                                            </strong>--}}
{{--                                            <strong class="Compare-price">$85.00--}}
{{--                                            </strong>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
