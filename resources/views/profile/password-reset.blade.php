@extends('layouts.account.default')

@section ('name', 'Сброс пароля')

@section('account-content')

    <div class="Profile">
        <form class="form Profile-form" method="POST" action="{{ route('password.update') }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="row-block">
                    <x-form-group label="Текущий пароль" id="current_password" name="current_password" placeholder="Тут текущий пароль" type="password"></x-form-group>
                    <x-form-group label="Новый пароль" id="password" name="password" placeholder="Тут новый пароль" type="password"></x-form-group>
                    <x-form-group label="Подтверждение пароля" id="password_confirmation" name="password_confirmation" placeholder="Введите пароль повторно" type="password"></x-form-group>

                    <div class="form-group">
                        <div class="Profile-btn">
                            <button class="btn btn_success" type="submit">Сохранить
                            </button>
                        </div>
                        @if (session('status') === 'password-updated')
                            <div class="Profile-success">Пароль успешно сохранен
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection


