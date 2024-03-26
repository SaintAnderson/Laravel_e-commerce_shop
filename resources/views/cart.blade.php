@extends('layouts.default')

@section('content')
    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    <h1 class="Middle-title">Корзина
                    </h1>
                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="{{ route('home') }}">Главная</a>
                        </li>
                        <li class="breadcrumbs-item breadcrumbs-item_current"><span>Корзина</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Section">
            <div class="wrap">
                <!-- TODO переход к форме оформления заказа -->
                @if(count($products) > 0)
                    <form class="form Cart" action="#" method="post">
                        @foreach($products as $product)
                            <div class="Cart-product">
                                <div class="Cart-block Cart-block_row">
                                    <div class="Cart-block Cart-block_pict">
                                        <a class="Cart-pict" href="{{ route('products.show', $product->attributes->slug) }}">
                                            <img class="Cart-img" src="{{ $product->attributes->image_url }}" alt=""/>
                                        </a>
                                    </div>
                                    <div class="Cart-block Cart-block_info">
                                        <a class="Cart-title"
                                           href="{{ route('products.show', $product->attributes->slug) }}">{{$product->name}}</a>
                                        <div class="Cart-desc">{{$product->attributes->description}}</div>
                                    </div>
                                </div>
                                <div class="Cart-block Cart-block_row">
                                    <div class="Cart-block Cart-block_amount">
                                        <div class="Cart-amount">
                                            <div class="Amount"><!-- TODO изменение количества -->
                                                <button class="Amount-remove" type="button">
                                                </button>
                                                <input class="Amount-input form-input" name="amount" type="text"
                                                       value="{{$product->quantity}}"/>
                                                <button class="Amount-add" type="button">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="Cart-block Cart-block_price">
                                        <div class="Cart-price">{{$product->price}}$
                                        </div>
                                    </div>
                                    <div class="Cart-block Cart-block_delete">
                                        <a class="Cart-delete"
                                           href="{{ route('cart.remove', $product->attributes->slug) }}">
                                            <img src="{{ asset('assets/img/icons/card/delete.svg') }}"
                                                 alt="delete.svg"/>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="Cart-total">
                            <div class="Cart-block Cart-block_total">
                                <strong class="Cart-title">Итого:
                                </strong><span class="Cart-price">{{\Cart::getSubTotal()}}$</span>
                                <!--<span class="Cart-price_old hidden">250.99$</span> TODO добавить когда сделаем скидки-->
                            </div>
                            <div class="Cart-block">
                                <a class="btn btn_success btn_lg" href="{{ route('checkout') }}">Оформить заказ</a>
                            </div>
                        </div>
                    </form>
                @else
                    <div>Ничего нет</div>
                @endif
            </div>
        </div>
    </div>
@endsection
