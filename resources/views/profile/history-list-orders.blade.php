@extends('layouts.account.default')
@section('name', 'История заказов')
@section('account-content')
    <div class="Orders">
        @if(empty($orders))
            <span>История заказов пустая</span>
        @endif
        @foreach($orders as $order)
            <div class="Order Order_anons">
                <div class="Order-personal">
                        <div class="row">
                            <div class="row-block">
                                <a class="Order-title" href="oneorder.html">
                                    Заказ&#32;<span class="Order-numberOrder">№ {{ $order->id }}</span>
                                </a>
                                <div class="Order-infoType">Адрес:</div>
                                <div class="Order-infoContent">{{ $order->address }}</div>
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
                                </div>
                                @if(!$order->pay)
                                        <form class="form-payment" method="post" action="{{ route('checkout.payment') }}">
                                            @csrf
                                            <input type="hidden" name="first_name" value="{{ $order->first_name }}">
                                            <input type="hidden" name="middle_name" value="{{ $order->middle_name }}">
                                            <input type="hidden" name="last_name" value="{{ $order->last_name }}">
                                            <input type="hidden" name="mail" value="{{ $order->mail }}">
                                            <input type="hidden" name="address" value="{{ $order->address }}">
                                            <input type="hidden" name="pay" value="{{ $order->pay }}">
                                            <input type="hidden" name="delivery_id" value="{{ $order->delivery_id }}">

                                            <button class="Order-infoContent">Оплатить</button>
                                        </form>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        @endforeach
    </div>
@endsection
