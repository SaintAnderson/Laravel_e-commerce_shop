@extends('layouts.default')

@section('content')
    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    <h1 class="Middle-title">{{$shopTitle}}
                    </h1>
                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="{{ route('home') }}">Главная</a>
                        </li>
                        <li class="breadcrumbs-item breadcrumbs-item_current"><span>Контакты</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="Section Section_column Section_columnRight Section_columnWide">
            <div class="wrap">
                <div class="Section-column">
                    @include('components.advantages')
                </div>
                <div class="Section-content">
                    <div class="Map">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aab0c930ee3de165a0eaa7eab3c5e810a0019bf38d9c3e3b44ca793b8ba10aad9&amp;amp;width=100%25&amp;amp;height=486&amp;amp;lang=ru_RU&amp;amp;scroll=true"></script>
                    </div>
                    <div class="Contacts Contacts_main">
                        <div class="Contacts-block">
                            <div class="media">
                                <div class="media-image"><img src="assets/img/icons/contacts/phone.svg" alt="phone.svg"/>
                                </div>
                                <div class="media-content">{{$shopPhone}}
                                </div>
                            </div>
                        </div>
                        <div class="Contacts-block">
                            <div class="media">
                                <div class="media-image"><img src="assets/img/icons/contacts/address.svg" alt="address.svg"/>
                                </div>
                                <div class="media-content">
                                    {{$shopAddress}}
                                </div>
                            </div>
                        </div>
                        <div class="Contacts-block">
                            <div class="media">
                                <div class="media-image"><img src="assets/img/icons/contacts/mail.svg" alt="mail.svg"/>
                                </div>
                                <div class="media-content">{{$shopEmail}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
