@extends('layouts.account.default')

@section('name', 'Профиль')

@section('account-content')

    <div class="Profile">
        <form class="form Profile-form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="row-block">
                    <x-form-group label="E-mail" id="email" name='email' required>
                        {{ old('email', $user->email) }}
                    </x-form-group>
                </div>
                <div class="row-block">
                    <x-form-group label="Фамилия" id="last_name" name="last_name" required>
                        {{ old('last_name', $user->last_name) }}
                    </x-form-group>

                    <x-form-group label="Имя" id="first_name" name="first_name" required>
                        {{ old('first_name', $user->first_name) }}
                    </x-form-group>

                    <x-form-group label="Отчество" id="middle_name" name="middle_name">
                        {{ old('middle_name', $user->middle_name) }}
                    </x-form-group>

                    <div class="form-group">
                        <div class="Profile-btn">
                            <button class="btn btn_success" type="submit">Сохранить
                            </button>
                        </div>
                        @if (session('status') === 'profile-updated')
                            <div class="Profile-success">Профиль успешно сохранен
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
