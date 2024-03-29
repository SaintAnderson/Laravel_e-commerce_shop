@extends('layouts.account.default')

@section('name', 'Личный кабинет')

@section('account-content')
    <div class="Account">
        <div class="Account-group">
            <div class="Account-column">
                <div class="Account-name">{{ $user->first_name }} {{ $user->last_name }} {{ $user->middle_name }}
                </div><a class="Account-editLink" href="{{ route('profile.edit') }}">Редактировать профиль</a>
            </div>
        </div>
        <div class="Account-group">
            <div class="Account-column Account-column_full">
                <header class="Section-header">
                    <h2 class="Section-title">История просмотров
                    </h2>
                </header>
                <div class="Cards Cards_account">
                    @foreach($viewedProducts as $viewedProduct)
                        @include('components.products.product-card', ['product' => $viewedProduct->product])
                    @endforeach
                </div>
                <div class="Account-editLink Account-editLink_view"><a href="{{ route('profile.viewed-products') }}">Перейти
                        на полный
                        список</a>
                </div>
            </div>
        </div>
    </div>
@endsection
