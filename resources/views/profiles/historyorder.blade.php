@extends('layouts.profiles.default')

@section('name', 'История заказов')

@section('content')

    <div class="Orders">
        <x-order-info id="1" date="20.07.2020" delivery="Обычная доставка" payment="Онлайн картой" oldprice="110" price="100" status="Оплачен"></x-order-info>
    </div>

@endsection
