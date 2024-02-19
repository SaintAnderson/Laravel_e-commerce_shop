@extends('layouts.default')

@section('content')
    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    <h1 class="Middle-title">Каталог товаров
                    </h1>
                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="/">Главная</a>
                        </li>
                        <li class="breadcrumbs-item breadcrumbs-item_current"><span>Каталог</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Section Section_column Section_columnLeft">
            <div class="wrap">
                <div class="Section-column">
                    <div class="Section-columnSection">
                        <header class="Section-header">
                            <strong class="Section-title">Поиск
                            </strong>
                        </header>
                        <div class="Section-columnContent">
                            <form class="form" action="#" method="post">
                                <div class="form-group">
                                    <div class="range Section-columnRange">
                                        <input class="range-line" id="price" name="price" type="text" data-type="double"
                                               data-min="7" data-max="50" data-from="7" data-to="27"/>
                                        <div class="range-price">Цена:&#32;
                                            <div class="rangePrice">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-input form-input_full" id="title" name="title" type="text"
                                           placeholder="Название"/>
                                </div>
                                <div class="form-group">
                                    <!-- - var options = setOptions(items, ['value', 'selected', 'disabled']);-->
                                    <select class="form-select">
                                        <option value="seller" selected="selected" disabled="disabled">Продавец
                                        </option>
                                        <option value="kkk">Kkkk
                                        </option>
                                        <option value="sdfsdf">sdfsdf
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="toggle">
                                        <input type="checkbox"/><span class="toggle-box"></span><span
                                            class="toggle-text">Только товары в наличии</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="toggle">
                                        <input type="checkbox"/><span class="toggle-box"></span><span
                                            class="toggle-text">С бесплатной доставкой</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <div class="buttons"><a class="btn btn_square btn_dark btn_narrow"
                                                            href="#">Найти</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="Section-content">
                    <div class="Sort">
                        <div class="Sort-title">Сортировать по:
                        </div>
                        <div class="Sort-variants"><a class="Sort-sortBy Sort-sortBy_dec" href="#">Популярности</a><a
                                class="Sort-sortBy" href="#">Цене</a><a class="Sort-sortBy" href="#">Отзывам</a><a
                                class="Sort-sortBy Sort-sortBy_inc" href="#">Новизне</a>
                        </div>
                    </div>
                    <div class="Cards">
                        @foreach($products as $product)
                            @include('components.products.product-card', ['product' => $product])
                        @endforeach
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
