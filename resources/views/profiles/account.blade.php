@extends('layouts.profiles.default')

@section('name', 'Личный кабинет')

@section('profile')
    <div class="Account">
        <div class="Account-group">
            <div class="Account-column">
                <div class="Account-avatar"><img src="{{ $user->getAvatar() }}"
                        alt="avatar" />
                </div>
            </div>
            <div class="Account-column">
                <div class="Account-name">{{ $user->first_name }} {{ $user->last_name }} {{ $user->middle_name }}
                </div><a class="Account-editLink" href="{{ route('profile.edit') }}">Редактировать профиль</a>
            </div>
        </div>
        <div class="Account-group">
            <div class="Account-column Account-column_full">
                <x-order-info id="1" date="20.07.2020" delivery="Обычная доставка" payment="Онлайн картой" oldprice="110" price="100" status="Оплачен" :links="[['name' => 'История заказов', 'href' => route('profile.historyorder')]]"></x-order-info>
            </div>
        </div>
        <div class="Account-group">
            <div class="Account-column Account-column_full">
                <header class="Section-header">
                    <h2 class="Section-title">История просмотров
                    </h2>
                </header>
                <div class="Cards Cards_account"></div>
                <div class="Account-editLink Account-editLink_view"><a href="#">Перейти
                        на полный
                        список</a>
                </div>
            </div>
        </div>
    </div>
@endsection
