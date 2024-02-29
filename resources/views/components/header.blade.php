<header class="Header">
    <div class="ControlPanel">
        <div class="wrap">
            <div class="row ControlPanel-row">
                <div class="row-block">
                    <div class="row ControlPanel-rowSplit">
                        <div class="row-block"><a class="ControlPanel-title" href="#">Free Delivery</a>
                        </div>
                        <div class="row-block hide_700"><span class="ControlPanel-title">Follow Us</span>
                            <ul class="menu menu_img menu_smallImg ControlPanel-menu">
                                <li class="menu-item"><a class="menu-link" href="#"><img
                                            src="/assets/img/icons/socialHeader/fb.svg" alt="fb.svg"/></a>
                                </li>
                                <li class="menu-item"><a class="menu-link" href="#"><img
                                            src="/assets/img/icons/socialHeader/tw.svg" alt="tw.svg"/></a>
                                </li>
                                <li class="menu-item"><a class="menu-link" href="#"><img
                                            src="/assets/img/icons/socialHeader/in.svg" alt="in.svg"/></a>
                                </li>
                                <li class="menu-item"><a class="menu-link" href="#"><img
                                            src="/assets/img/icons/socialHeader/pt.svg" alt="pt.svg"/></a>
                                </li>
                                <li class="menu-item"><a class="menu-link" href="#"><img
                                            src="/assets/img/icons/socialHeader/mail.svg" alt="mail.svg"/></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <nav class="row-block">
                    <div class="row ControlPanel-rowSplit">
                        @auth
                            <div class="row-block"><a class="ControlPanel-title" href="{{ route('profile.edit') }}">Профиль</a>
                                <div class="row-block"></div>
                                <div class="row-block">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link class="ControlPanel-title" :href="route('logout')"
                                                         onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Выйти') }}
                                        </x-dropdown-link>
                                    </form>
                                </div>
                                @else
                                    <div class="row-block"><a class="ControlPanel-title" href="{{ route('login') }}">Войти</a>
                                        <div class="row-block"></div>
                                        <div class="row-block"><a class="ControlPanel-title"
                                                                  href="{{ route('register') }}">Зарегистрироваться</a>
                                            @endauth
                                        </div>
                                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="wrap">
        <div class="row Header-rowMain">
            <div class="row-block Header-logo"><a class="logo" href="{{ route('home') }}">
                    <img class="logo-image" src="/assets/img/logo.png" alt="logo.png"/></a>
            </div>
            <nav class="row-block row-block_right Header-menu">
                <div class="menuModal" id="navigate">
                    <ul class="menu menu_main">
                        <li class="menu-item"><a class="menu-link" href="{{ route('home') }}">Главная</a>
                        </li>
                        <li class="menu-item"><span class="menu-label menu-label_danger">New</span><a
                                class="menu-link" href="shop.html">Shop</a>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="sale.html">Blog</a>
                        </li>
                        <li class="menu-item"><span class="menu-label menu-label_success">Hot</span><a
                                class="menu-link" href="product.html">Gallery</a>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="contacts.html">Contacts</a>
                        </li>
                        <li class="menu-item"><a class="menu-link" href="{{ route('catalog') }}">Каталог</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="row-block">
                <div class="CartBlock">
                    <a class="CartBlock-block" href="compare.html">
                        <img class="CartBlock-img" src="/assets/img/icons/exchange.svg" alt="exchange.svg"/>
                        <span class="CartBlock-amount">4</span>
                    </a>
                    <a class="CartBlock-block" href="{{ route('cart') }}">
                        <img class="CartBlock-img" src="/assets/img/icons/cart.svg" alt="cart.svg"/>
                        @auth
                            <span
                                class="CartBlock-amount">{{\Cart::session(auth()->user()->id)->getTotalQuantity()}}</span>
                        @else
                            <span
                                class="CartBlock-amount">{{\Cart::session(Session::getId())->getTotalQuantity()}}</span>
                        @endauth
                    </a>
                    <div class="CartBlock-block">
                        @auth
                            <span class="CartBlock-price">{{\Cart::session(auth()->user()->id)->getSubTotal()}}$</span>
                        @else
                            <span class="CartBlock-price">{{\Cart::session(Session::getId())->getSubTotal()}}$</span>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="row-block Header-trigger"><a class="menuTrigger" href="#navigate">
                    <div class="menuTrigger-content">Показать навигацию
                    </div>
                    <span></span><span></span><span></span>
                </a>
            </div>
        </div>
    </div>
    <div class="Header-searchWrap">
        <div class="wrap">
            @include('components.category.category-menu')
            <div class="Header-searchLink"><img src="/assets/img/icons/search.svg" alt="search.svg"/>
            </div>
            <div class="Header-search">
                <div class="search">
                    <form class="form form_search" action="#" method="post">
                        <input class="search-input" id="query" name="query" type="text"
                               placeholder="What are you looking for ..."/>
                        <button class="search-button" type="submit" name="search" id="search"><img
                                src="/assets/img/icons/search.svg" alt="search.svg"/>Search
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
