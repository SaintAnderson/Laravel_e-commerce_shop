<div class="Section-column">
    <div class="Section-columnSection">
        <header class="Section-header">
            <strong class="Section-title">Навигация
            </strong>
        </header>
        <div class="Section-columnContent">
            <div class="NavigateProfile">
                <ul class="menu menu_vt">
                    <x-responsive-nav-link :href="route('profile.show')" :active="request()->routeIs('profile.show')">
                        Личный кабинет
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                        Профиль
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('password.edit')" :active="request()->routeIs('password.edit')">
                        Сброс пароля
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('profile.historyorder')" :active="request()->routeIs('profile.historyorder')">
                        История заказов
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('profile.historyview')" :active="request()->routeIs('profile.historyview')">
                        История просмотра
                    </x-responsive-nav-link>
                </ul>
            </div>
        </div>
    </div>
</div>