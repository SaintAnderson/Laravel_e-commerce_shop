@extends('layouts.default')

@section('content')
    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    <h1 class="Middle-title">Оформление заказа
                    </h1>
                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="{{ url('/') }}">Главная</a>
                        </li>
                        <li class="breadcrumbs-item breadcrumbs-item_current"><span>Оформление заказа</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Section Section_column Section_columnRight Section_columnWide Order">
            <div class="wrap">
                <div class="Section-column">
                    <div class="Section-columnSection">
                        <header class="Section-header">
                            <strong class="Section-title">Прогресс заполнения
                            </strong>
                        </header>
                        <div class="Section-columnContent">
                            <ul class="menu menu_vt Order-navigate">
                                <li class="menu-item_ACTIVE menu-item"><a class="menu-link" href="#step1">Шаг 1. Параметры пользователя</a>
                                </li>
                                <li class="menu-item"><a class="menu-link" href="#step2"><a class="menu-link" href="#step2">Шаг 2. Способ доставки</a>
                                </li>
                                <li class="menu-item"><a class="menu-link" href="#step3"><a class="menu-link" href="#step3">Шаг 3. Способ оплаты</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="Section-content">
                    <form class="form" action="{{ route('checkout.payment') }}" method="POST">
                        @csrf
                        <div class="Order-block Order-block_OPEN" id="step1">
                            @include('components.checkout.step_registration', ['user' => $user])
                        </div>
                        <div class="Order-block" id="step2">
                            @include('components.checkout.step_delivery', ['deliveryMethods' => $deliveryMethods])
                        </div>
                        <div class="Order-block" id="step3">
                            @include('components.checkout.step_payment')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
