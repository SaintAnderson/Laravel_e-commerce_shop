@extends('layouts.default')

@section('head')
    @vite('resources/css/rating.css')
@endsection

@section('content')

    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    @if(strlen($product->title) <= 40)
                        <h1 class="Middle-title"> {{$product->title}}
                        </h1>
                    @else
                        <h1 class="Middle-title"> {{ substr($product->title,0,40)."..." }}
                        </h1>
                    @endif

                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="{{route('home')}}">Главная</a>
                        </li>
                        @if(mb_strlen($product->title) <= 40)
                            <li class="breadcrumbs-item breadcrumbs-item_current"><span>{{$product->title}}</span>
                            </li>
                        @else
                            <li class="breadcrumbs-item breadcrumbs-item_current">
                                <span>{{substr($product->title,0,40)."..."}}</span>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="Section">
            <div class="wrap">
                <div class="Product">
                    <div class="ProductCard">
                        <div class="ProductCard-look">
                            <div class="ProductCard-photo">
                                <img src="{{ $product->image_url }}" alt=""/>
                            </div>
                        </div>
                        <div class="ProductCard-desc">
                            <div class="ProductCard-header">
                                <h2 class="ProductCard-title">{{$product->title}}</h2>
                                <div class="ProductCard-info">
                                    <div class="ProductCard-cost">
                                        <div class="ProductCard-price">${{$product->price}}</div>
                                        @if($product->old_price > 0)
                                            <div class="ProductCard-priceOld">${{$product->old_price}}</div>
                                        @endif
                                    </div>
                                    <div class="ProductCard-compare">
                                        <a class="btn btn_default change" href="#" data-id="{{ $product->id }}">
                                            <img class="btn-icon" src="/assets/img/icons/card/change.svg"
                                                 alt="change.svg"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="ProductCard-cart">
                                <div class="ProductCard-cartElement">
                                    @if(\Cart::session($sessionId)->get($product->id))
                                        <a class="btn btn_primary" href="{{route('cart')}}">
                                            <span class="btn-content">В корзине</span>
                                        </a>
                                    @else
                                        <a class="btn btn_primary" href="{{route('cart.add', $product)}}">
                                            <img class="btn-icon" src="/assets/img/icons/card/cart_white.svg"
                                                 alt="cart_white.svg"/>
                                            <span class="btn-content">В корзину</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="ProductCard-footer">
                                <div class="ProductCard-tags">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Tabs Tabs_default">
                    <div class="Tabs-links">
                        <a class="Tabs-link_ACTIVE Tabs-link" href="#description">
                            <span>Описание</span>
                        </a>
                        <a class="Tabs-link" href="{{asset("/sellers/$product->seller_id")}}" target="_blank">
                            <strong>Продавец - {{$product->seller->title}}</strong>
                        </a>
                        <a class="Tabs-link" href="#reviews">
                            <span>Отзывы ({{ $reviewCount }})</span>
                        </a>
                    </div>
                    <div class="Tabs-wrap">
                        <div class="Tabs-block" id="description">
                            <h2>{{$product->title}}</h2>
                            <p>{{$product->description}}</p>
                            <div class="clearfix"></div>
                            <div class="table">
                                <table>
                                    <tr>
                                        <th>Характеристика</th>
                                        <th>Значение</th>
                                    </tr>
                                    <tr>
                                        <td>Артикул</td>
                                        <td>{{$product->article}}</td>
                                    </tr>
                                    <tr>
                                        <td>Лимитированный</td>
                                        @if($product->is_limited_edition)
                                            <td>да</td>
                                        @else
                                            <td>нет</td>
                                        @endif
                                    </tr>
                                    @foreach($product->specifications as $specification)
                                        <tr>
                                            <td>{{ $specification->name }}</td>
                                            <td>{{ $specification->pivot->value }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        @include('components.reviews.product-review-block')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
