<header class="Header">
    <div class="ControlPanel">
        <div class="wrap">
            <div class="row ControlPanel-row">
                <div class="row-block">
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
            <div class="row-block Header-logo">
                <a class="logo" href="{{ route('home') }}"><img class="logo-image" src="/assets/img/logo.png" alt="logo.png"/></a>
            </div>
            <nav class="row-block row-block_right Header-menu">
                <div class="menuModal" id="navigate">
                    <ul class="menu menu_main">
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('home') }}">Главная</a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{route('contacts')}}">Контакты</a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('catalog') }}">Каталог</a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('about') }}">О нас</a>
                        </li>
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('articles.index') }}">Блог</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="row-block">
                <div class="CartBlock">
                    <a class="CartBlock-block" href="{{ url('compare') }}">
                        <img class="CartBlock-img" src="/assets/img/icons/exchange.svg" alt="exchange.svg"/>
                        <span class="CartBlock-amount">{{ session()->get('products_in_comparison') ? count(session()->get('products_in_comparison')) : 0 }}</span>
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
            <div class="Header-searchLink">
                <img src="{{ asset('assets/img/icons/search.svg') }}" alt="search.svg"/>
            </div>
            <div class="Header-search">
                <div class="search">
                    <form class="form form_search" action="{{ route('catalog') }}" method="get">
                        <input class="search-input" id="query" name="filter[title]" type="text"
                               placeholder="Поиск товаров..."/>
                        <button class="search-button" type="submit"><img
                                src="/assets/img/icons/search.svg" alt="search.svg"/>Поиск
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
