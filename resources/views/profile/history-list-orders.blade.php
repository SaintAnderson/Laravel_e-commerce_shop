@extends('layouts.account.default')
@section('name', 'История заказов')
@section('account-content')
    <div class="Orders">
        @foreach($orders as $order)
            <div class="Order Order_anons">
                <div class="Order-personal">
                        <div class="row">
                            <div class="row-block">
                                <a class="Order-title" href="oneorder.html">
                                    Заказ&#32;<span class="Order-numberOrder">№ {{ $order->id }}</span>
                                </a>
                            </div>
                            <div class="row-block">
                                <div class="Order-info Order-info_delivery">
                                    <div class="Order-infoType">Тип доставки:
                                    </div>
                                    <div class="Order-infoContent">{{ $order->delivery_method->name }}
                                    </div>
                                </div>
                                <div class="Order-info">
                                    <div class="Order-infoType">Общая стоимость:
                                    </div>
                                    <div class="Order-infoContent">
                                        <span class="Order-price">{{ $order->fullprice }} $</span>
                                    </div>
                                </div>
                                <div class="Order-info Order-info_status">
                                    <div class="Order-infoType">Статус:</div>
                                    <div class="Order-infoContent">{{ $order->pay ?'Оплачен' : 'Не оплачен' }}</div>
                                    @if(!$order->pay)
                                        <div class="Order-infoContent"><a href="{{ route('checkout.payment') }}">Оплатить</a></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
@endsection
