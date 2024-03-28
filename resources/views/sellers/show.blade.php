@extends('layouts.default')

@section('content')
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
        <div class="section">
            <div class="wrap">
                <div>
                    <ul>
                        <li><b>Информация о продавце: </b> {{$seller->description}}</li>
                        <li><b>Телефон: </b> {{$seller->phone}} </li>
                        <li><b>E-mail: </b> {{$seller->email}} </li>
                    </ul>
                </div>
                @include('catalog.catalog', ['products' => $products, 'request' => $request])
            </div>
        </div>
    </div>
@endsection
