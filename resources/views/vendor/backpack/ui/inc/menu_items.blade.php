{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Категории" icon="la la-question" :link="backpack_url('category')" />
<x-backpack::menu-item title="Баннеры" icon="la la-question" :link="backpack_url('banner')" />
<x-backpack::menu-item title="Хранилище" icon="la la-question" :link="backpack_url('database-storage-model')" />
<x-backpack::menu-item title="Товары" icon="la la-question" :link="backpack_url('product')" />
<x-backpack::menu-item title="Просмотры товаров" icon="la la-question" :link="backpack_url('product-view')" />
<x-backpack::menu-item title="Отзывы" icon="la la-question" :link="backpack_url('review')" />
<x-backpack::menu-item title="Роли" icon="la la-question" :link="backpack_url('role')" />
<x-backpack::menu-item title="Продавцы" icon="la la-question" :link="backpack_url('seller')" />
<x-backpack::menu-item title="Настройки" icon="la la-question" :link="backpack_url('setting')" />
<x-backpack::menu-item title="Пользователи" icon="la la-question" :link="backpack_url('user')" />

<x-backpack::menu-item title="Banners" icon="la la-question" :link="backpack_url('banner')" />
<x-backpack::menu-item title="Categories" icon="la la-question" :link="backpack_url('category')" />
<x-backpack::menu-item title="Database storage models" icon="la la-question" :link="backpack_url('database-storage-model')" />
<x-backpack::menu-item title="Products" icon="la la-question" :link="backpack_url('product')" />
<x-backpack::menu-item title="Product views" icon="la la-question" :link="backpack_url('product-view')" />
<x-backpack::menu-item title="Reviews" icon="la la-question" :link="backpack_url('review')" />
<x-backpack::menu-item title="Roles" icon="la la-question" :link="backpack_url('role')" />
<x-backpack::menu-item title="Sellers" icon="la la-question" :link="backpack_url('seller')" />
<x-backpack::menu-item title="Settings" icon="la la-question" :link="backpack_url('setting')" />
<x-backpack::menu-item title="Specifications" icon="la la-question" :link="backpack_url('specification')" />
<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />
<x-backpack::menu-item title="Imports" icon="la la-question" :link="backpack_url('import')" />