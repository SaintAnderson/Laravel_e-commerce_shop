{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Категории" icon="las la-folder" :link="backpack_url('category')" />
<x-backpack::menu-item title="Баннеры" icon="las la-image" :link="backpack_url('banner')" />
<x-backpack::menu-item title="Товары" icon="las la-shopping-bag" :link="backpack_url('product')" />
<x-backpack::menu-item title="Импорт товаров" icon="las la-cloud-upload-alt" :link="backpack_url('import')" />
<x-backpack::menu-item title="Просмотры товаров" icon="las la-eye" :link="backpack_url('product-view')" />
<x-backpack::menu-item title="Отзывы" icon="las la-comment" :link="backpack_url('review')" />
<x-backpack::menu-item title="Продавцы" icon="las la-store" :link="backpack_url('seller')" />
<x-backpack::menu-item title="Настройки" icon="las la-cog" :link="backpack_url('setting')" />
<x-backpack::menu-item title="Преимущества" icon="las la-burn" :link="backpack_url('advantage')" />
<x-backpack::menu-item title="Роли" icon="las la-user-lock" :link="backpack_url('role')" />
<x-backpack::menu-item title="Пользователи" icon="las la-user" :link="backpack_url('user')" />
<x-backpack::menu-item title="Блог" icon="la la-list-alt" :link="backpack_url('article')" />
<x-backpack::menu-item title="Характеристики" icon="la la-cogs" :link="backpack_url('specification')" />

<x-backpack::menu-item title="Купоны" icon="la la-question" :link="backpack_url('coupon')" />