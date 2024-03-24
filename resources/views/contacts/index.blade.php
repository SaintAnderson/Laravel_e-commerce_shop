@extends('layouts.default')

@section('content')
    <div class="Middle Middle_top">
        <div class="Middle-top">
            <div class="wrap">
                <div class="Middle-header">
                    <h1 class="Middle-title">{{$shopTitle}}
                    </h1>
                    <ul class="breadcrumbs Middle-breadcrumbs">
                        <li class="breadcrumbs-item"><a href="index.html">home</a>
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

                    <div class="Section-columnSection">
                        <header class="Section-header">
                            <strong class="Section-title">Follow Us
                            </strong>
                        </header>
                        <div class="Section-columnContent">
                            <div class="Footer-payments Footer-payments_column">
                                <div><img src="assets/img/icons/socialContent/fb.png" alt="fb.png"/>
                                </div>
                                <div><img src="assets/img/icons/socialContent/tw.png" alt="tw.png"/>
                                </div>
                                <div><img src="assets/img/icons/socialContent/gg.png" alt="gg.png"/>
                                </div>
                                <div><img src="assets/img/icons/socialContent/in.png" alt="in.png"/>
                                </div>
                                <div><img src="assets/img/icons/socialContent/pt.png" alt="pt.png"/>
                                </div>
                                <div><img src="assets/img/icons/socialContent/ml.png" alt="ml.png"/>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <header class="Section-header Section-header_sm">
                        <h2 class="Section-title">Contact Form
                        </h2>
                    </header>
                    <form class="form form_contacts" action="#" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="row-block">
                                    <input class="form-input" id="name" name="name" type="text" placeholder="Name"/>
                                </div>
                                <div class="row-block">
                                    <input class="form-input" id="mail" name="mail" type="text" placeholder="Email"/>
                                </div>
                                <div class="row-block">
                                    <input class="form-input" id="site" name="site" type="text" placeholder="Website"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-textarea" name="message" id="message" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group"><a class="btn btn_muted form-btn" href="#">Send Message</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
