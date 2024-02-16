@extends('layouts.default')

@section('content')
    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    <h1 class="Middle-title">Профиль
                    </h1>
                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="index.html">home</a>
                        </li>
                        <li class="breadcrumbs-item breadcrumbs-item_current"><span>Профиль</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Section Section_column Section_columnLeft">
            <div class="wrap">
                <div class="Section-column">
                    <div class="Section-columnSection">
                        <header class="Section-header">
                            <strong class="Section-title">Навигация
                            </strong>
                        </header>
                        <div class="Section-columnContent">
                            <div class="NavigateProfile">
                                <ul class="menu menu_vt">
                                    <li class="menu-item"><a class="menu-link" href="account.html">Личный кабинет</a>
                                    </li>
                                    <li class="menu-item_ACTIVE menu-item"><a class="menu-link"
                                            href="profile.html">Профиль</a>
                                    </li>
                                    <li class="menu-item"><a class="menu-link" href="historyorder.html">История
                                            заказов</a>
                                    </li>
                                    <li class="menu-item"><a class="menu-link" href="historyview.html">История
                                            просмотра</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="Section-content">
                    <div class="Profile">
                        <form class="form Profile-form" action="#" method="post">
                            <div class="row">
                                <div class="row-block">
                                    <div class="form-group">
                                        <label class="form-label" for="avatar">Аватар
                                        </label>
                                        <div class="Profile-avatar Profile-avatar_noimg">
                                            <div class="Profile-img"><img src="assets/img/#.png" alt="#.png" />
                                            </div>
                                            <label class="Profile-fileLabel" for="avatar">Выберите аватар
                                            </label>
                                            <input class="Profile-file form-input" id="avatar" name="avatar" type="file"
                                                data-validate="onlyImgAvatar" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="name">ФИО
                                        </label>
                                        <input class="form-input" id="name" name="name" type="text" value=""
                                            data-validate="require" />
                                    </div>
                                </div>
                                <div class="row-block">
                                    <div class="form-group">
                                        <label class="form-label" for="phone">Телефон
                                        </label>
                                        <input class="form-input" id="phone" name="phone" type="text"
                                            value="+70000000000" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="mail">E-mail
                                        </label>
                                        <input class="form-input" id="mail" name="mail" type="text"
                                            value="send@test.test" data-validate="require" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="password">Пароль
                                        </label>
                                        <input class="form-input" id="password" name="password" type="password"
                                            placeholder="Тут можно изменить пароль" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="passwordReply">Подтверждение пароля
                                        </label>
                                        <input class="form-input" id="passwordReply" name="passwordReply"
                                            type="password" placeholder="Введите пароль повторно" />
                                    </div>
                                    <div class="form-group">
                                        <div class="Profile-btn">
                                            <button class="btn btn_success" type="submit">Сохранить
                                            </button>
                                        </div>
                                        <div class="Profile-success">Профиль успешно сохранен
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection