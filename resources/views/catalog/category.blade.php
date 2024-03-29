@extends('layouts.default')

@section('content')
    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    <h1 class="Middle-title">{{$category->name}}
                    </h1>
                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="{{ route('home') }}">Главная</a>
                        </li>
                        <li class="breadcrumbs-item breadcrumbs-item_current"><span>Каталог</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @include('catalog.catalog',['products' => $products, 'request' => $request])
    </div>
@endsection
