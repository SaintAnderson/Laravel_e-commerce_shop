@extends('layouts.default')

@section('content')
    <?php
    /** @var $seller */
    /** @var $request */
//echo __FILE__;
//    echo '<pre>';
//    var_dump($seller->id);
//    var_dump($seller->title);
//    var_dump($seller->description);
//    var_dump($seller->phone);
//    var_dump($seller->email);
//    echo '<hr>$request->filter: ';
//    var_dump($request->filter);
//    echo '<hr>$request->sort: ';
//    var_dump($request->sort);
//    echo '<hr>';
//    echo '</pre>';
    ?>
    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    <h2 class="Middle-title">{{$seller->title}}  </h2>

                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="index.html">Главная</a>
                        </li>
                        <li class="breadcrumbs-item breadcrumbs-item_current"><span>Продавец</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul>
            <li><b>Информация о продавце: </b> {{$seller->description}}</li>
            <li><b>Телефон: </b> {{$seller->phone}} </li>
            <li><b>E-mail: </b> {{$seller->email}} </li>
        </ul>
        <br>
        <h3>Каталог товаров продавца:</h3>

            @include('catalog.catalog', ['products' => $products, 'request' => $request])

    </div>

@endsection
